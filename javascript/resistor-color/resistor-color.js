
export const colorCode = (colorName) => {
  for (let item in COLORS) {
    if (COLORS[item] === colorName) {
      return parseInt(item)
    }
  }
};

export const COLORS = [
  'black',
  'brown',
  'red',
  'orange',
  'yellow',
  'green',
  'blue',
  'violet',
  'grey',
  'white',
];
