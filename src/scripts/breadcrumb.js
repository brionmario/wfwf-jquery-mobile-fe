var breadcrumb;

export function setBreadcrumb(arr) {
  var ul = document.getElementById('breadcrumb-list');
  breadcrumb = arr;

  breadcrumb.forEach(item => {
    var li = document.createElement('li');
    var a = document.createElement('a');
    var i = document.createElement('i');

    li.className = 'breadcrumb-item';
    i.className = 'fa fa-angle-right';

    ul.appendChild(li);
    li.appendChild(a);

    a.setAttribute('href', item.href);
    a.setAttribute('rel', 'external');

    if (breadcrumb.length === 1) {
      a.appendChild(i);
      a.innerHTML += item.name;
    } else if (breadcrumb.indexOf(item) === breadcrumb.length - 1) {
      a.innerHTML += item.name;
    } else {
      a.innerHTML += item.name;
      a.appendChild(i);
    }
  });
}

export function getBreadcrumb() {
  return breadcrumb;
}
