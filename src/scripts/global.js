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

export function getCookie(name) {
  if (document.cookie.length > 0) {
    let cookieStart = document.cookie.indexOf(name + '=');
    if (cookieStart !== -1) {
      cookieStart = cookieStart + name.length + 1;
      let cookieEnd = document.cookie.indexOf(';', cookieStart);
      if (cookieEnd === -1) {
        cookieEnd = document.cookie.length;
      }
      console.log('Logged In user id', document.cookie.substring(cookieStart, cookieEnd));
      return unescape(document.cookie.substring(cookieStart, cookieEnd));
    }
  }
  console.log('User not logged in');
  return '';
}

export function removeCookie(name) {
  document.cookie = name + '=; Max-Age=-99999999;';
}

export function isLoggedIn() {
  if (getCookie('WFWF_user') !== '') {
    return true;
  }
  return false;
}

export function logout() {
  removeCookie('WFWF_user');
  navigatePage('index.php');
}

export function goToProfile() {
  var id = getCookie('WFWF_user');
  navigatePage(`profile.php?id=${id}`);
}

export function routeWithId(url) {
  var id = getCookie('WFWF_user');
  if (id !== '') {
    navigatePage(`${url}?id=${id}`);
  } else {
    navigatePage(`${url}`);
  }
}

export function routeWithIdAtEnd(url) {
  var id = getCookie('WFWF_user');
  if (id !== '') {
    navigatePage(`${url}&id=${id}`);
  } else {
    navigatePage(`${url}`);
  }
}

export function getUserID() {
  var id = getCookie('WFWF_user');
  if (id !== '') {
    return id;
  }
  return '';
}
