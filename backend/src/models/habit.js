const mongoose = require("mongoose");

const habitSchema = mongoose.Schema({
  name: {
    type: String,
    trim: true,
    required: true,
  },
  description: {
    type: String,
    trim: true,
  },
  // not using timestamps since this should be editable by the user
  start_date: {
    type: Date,
  },
  end_date: {
    type: Date,
  },
  is_everyday: {
    type: Boolean,
  },
  min_times: {
    type: Number,
  },
  max_times: {
    type: Number,
  },
  built_up_amount: {
    type: Number,
  },
  bounty: {
    type: Number,
  },
  date_status: {
    type: [Date],
  },
});

const Habit = mongoose.model("Post", habitSchema);

module.exports = Habit;
