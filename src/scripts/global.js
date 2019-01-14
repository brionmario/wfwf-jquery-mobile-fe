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

export function addCookie(value) {
  const cookieName = 'WFWF_user';
  const days = 1000;
  let expires = '';
  let date = new Date();
  date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
  expires = '; expires=' + date.toGMTString();
  document.cookie = cookieName + '=' + value + expires + '; path=/';
}
