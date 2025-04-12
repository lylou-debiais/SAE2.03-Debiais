let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let template2File = await fetch("./component/NavBar/template2.html");
let template_select = await template2File.text();

let template3File = await fetch("./component/NavBar/template3.html");
let template_select2 = await template3File.text();

let NavBar = {};
let NavBar_Category = {};
let NavBar_Profile = {};


NavBar.format = function (Retour, category, profile, Favoris) {
  let html = template;
  html = html.replace("{{Retour}}", Retour);
  html = html.replace("{{Favoris}}", Favoris);

  let categoriesHTML = "";
  for (let i = 0; i < category.length; i++) {
    categoriesHTML += NavBar_Category.format(category[i].name, category[i].id);
  }
  
  
  

  let profilesHTML = "";
  for (let i = 0; i < profile.length; i++) {
    profilesHTML += NavBar_Profile.format(profile[i].nom, profile[i].id);
    console.log(profilesHTML);
  }
  html = html.replace("{{categories}}", categoriesHTML);
  html = html.replace("{{profiles}}", profilesHTML);
  
  return html;
};

NavBar_Category.format = function (category_name, category_id) {
  let html = template_select;
  html = html.replace("{{category_name}}", category_name);
  html = html.replace("{{category_id}}", category_id);

  return html;
};

NavBar_Profile.format = function (profile_name, profile_id) {
  let html = template_select2;
  html = html.replace("{{profile_name}}", profile_name);
  html = html.replace("{{profile_id}}", profile_id);

  return html;
};


export { NavBar };
