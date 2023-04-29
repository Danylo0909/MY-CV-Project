let navmenu = document.querySelector(".top_menu");
let btn_mobile = document.querySelector(".mobile_menu");

btn_mobile.addEventListener("click", handleClick);

function handleClick(event) {
  event.preventDefault();
  navmenu.classList.toggle("open");
}

for (const form of document.forms) {
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const data = new FormData(form);
    data.append("from_js", "true");

    const search_param_obj = new URLSearchParams(data);
    const query_params = search_param_obj.toString();

    let url;
    get_url: {
      const url_parts = form.action.split("?");
      url =
        url_parts.length == 2
          ? url_parts[0] + "?" + url_parts[1] + "&" + query_params
          : url_parts[0] + "?" + query_params;
    }

    fetch(url);
  });
}
