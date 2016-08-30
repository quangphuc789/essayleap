function addDOM(dom, parent, html, id, className) {
    if (dom != null) {
        console.log(parent);
        var element = document.createElement(dom);
        if (id != null) element.id = id;
        if (className != null) element.className = className;
        if (html != null) element.innerHTML = html;
        if (parent != null) parent.appendChild(element);
        return element;
    }

    return null;
}