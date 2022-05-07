const express = require("express");
const app = express();
const mongoose = require("mongoose");
const dotenv = require("dotenv");
// helmet helps make requests to server secure
const helmet = require("helmet");
// morgan helps log server requests
const morgan = require("morgan");
// used for uploading files (not a good idea practice to do it in the app but this is done for example purposes - usually files are hosted on AWS or something similar)
const multer = require("multer");
// used to fetch uploaded files from server
const path = require("path");

const habitsRouter = require("./routes/habits");

dotenv.config();
mongoose.connect(
  process.env.MONGO_URL,
  {
    /* options */
  },
  (err) => {
    if (err) console.log(err);
    else console.log("MongoDB is connected");
  }
);

// MIDDLEWARE
app.use(express.json());
app.use(helmet());
app.use(morgan("common"));

// ROUTERS
app.use(habitsRouter);

const port = process.env.PORT;
app.listen(port, () => {
  console.log("Backend server is running!");
});
