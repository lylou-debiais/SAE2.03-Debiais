let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let template2File = await fetch("./component/NavBar/template2.html");
let template_select = await template2File.text();

let NavBar = {};
let NavBar_Category = {};


NavBar.format = function (hAbout, Retour, category) {
  let html = template;
  html = html.replace("{{hAbout}}", hAbout);
  html = html.replace("{{Retour}}", Retour);

  let categoriesHTML = "";
  for (let i = 0; i < category.length; i++) {
    categoriesHTML += NavBar_Category.format(category[i].name, category[i].id);
  }
  html = html.replace("{{categories}}", categoriesHTML);
  
  return html;
};

NavBar_Category.format = function (category_name, category_id) {
  let html = template_select;
  html = html.replace("{{category_name}}", category_name);
  html = html.replace("{{category_id}}", category_id);

  return html;
};



export { NavBar };
