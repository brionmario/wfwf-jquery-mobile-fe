export function getCurrentYear() {
  var now = new Date();
  var year = now.getYear();
  if (year < 1900) {
    year += 1900;
  }
  return year;
}

export function scrollToTop() {
  window.scrollTo(0, 0);
}

export function refreshPage() {
  window.location.reload(true);
}

export function replacePage(url) {
  window.location.replace(url);
}

export function navigatePage(url) {
  window.location.href = url;
}
