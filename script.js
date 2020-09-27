/**
 * Where we are storing the colors
 */
const colors = {
  red: 0,
  green: 0,
  blue: 0,
};

/**
 * Increment the color by one
 */
function increment(value) {
  value += 1;

  return value == 256 ? 0 : value;
}

/**
 * Gives a random number so we can increase a random color
 */
function getRandomNumber(maxNumber) {
  return Math.floor(Math.random() * Math.floor(maxNumber));
}

/**
 * Function that's incrementing the colors
 */
function incrementBackground() {
  const randomColorIndexToChange = getRandomNumber(Object.keys(colors).length - 1);

  const keyOfTheColorToChange = Object.keys(colors)[randomColorIndexToChange];

  colors[keyOfTheColorToChange] = increment(colors[keyOfTheColorToChange]);

  $('#background').css(
    'filter',
    `rgb(${colors.red}, ${colors.green},${colors.blue})`,
  );

  setTimeout(incrementBackground, 1);
}

setTimeout(incrementBackground, 1);