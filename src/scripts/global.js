export function () {
  var now = new Date();
  var year = now.getYear();
  if (year < 1900) {
    year += 1900;
  }
  return year;
};

export function scrollToTop() {
  window.scrollTo(0, 0);
}
