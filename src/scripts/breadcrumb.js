var breadcrumb;

export function setBreadcrumb(arr) {
  var ul = document.getElementById('breadcrumb-list');
  breadcrumb = arr;

  breadcrumb.forEach(item => {
    var li = document.createElement('li');
    var a = document.createElement('a');
    var i = document.createElement('i');
    var span = document.createElement('span');

    li.className = 'breadcrumb-item';
    i.className = 'fa fa-angle-right';
    span.className = 'breadcrumb-text';

    ul.appendChild(li);
    li.appendChild(a);
    a.appendChild(span);

    a.setAttribute('href', item.href);
    a.setAttribute('rel', 'external');

    if (breadcrumb.length === 1) {
      a.appendChild(i);
      span.innerHTML += item.name;
    } else if (breadcrumb.indexOf(item) === breadcrumb.length - 1) {
      span.innerHTML += item.name;
    } else {
      span.innerHTML += item.name;
      a.appendChild(i);
    }
  });
}

export function getBreadcrumb() {
  return breadcrumb;
}
