const Habit = require("../models/habit");
var express = require("express");
var router = express.Router();

router.get("/habits", async (req, res) => {
  const habitsDB = Habit;

  const habits = await habitsDB.find({}).exec((err, habitData) => {
    if (err) throw err;
    if (habitData) {
      res.end(JSON.stringify(habitData));
    } else {
      res.end();
    }
  });
});

router.post("/habit", async (req, res) => {
  const newHabit = new Habit({
    name: req.body.name,
    description: req.body.description,
  });

  try {
    await newHabit.save((err, newHabitResults) => {
      if (err) res.end("Error Saving.");
      //res.redirect("/habits");
      res.end();
    });
  } catch (err) {
    console.log(err);
    //res.redirect("/habits");
    res.end();
  }
});

router.post("/habitedit/:id", async (req, res) => {
  const updates = Object.keys(req.body);
  const allowedUpdates = ["name", "description"];

  const isValidOperation = updates.every((update) =>
    allowedUpdates.includes(update)
  );

  if (!isValidOperation) res.status(400).send({ error: "Invalid updates!" });

  try {
    const habit = await Habit.findOne({
      _id: req.params.id,
    });

    if (!habit) return res.status(404).send();

    updates.forEach((update) => {
      habit[update] = req.body[update];
    });
    await habit.save();

    return res.send(habit);
  } catch (e) {
    res.status(500).send();
  }
});

router.delete("/habits/:id", async (req, res) => {
  try {
    const habit = await Habit.findOneAndDelete({
      _id: req.params.id,
    });

    if (habit) return res.send(habit);
    return res.status(404).send();
  } catch (e) {
    res.status(500).send();
  }
});

module.exports = router;
