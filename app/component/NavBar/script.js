let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};

NavBar.format = function (hAbout, Retour) {
  let html = template;
  html = html.replace("{{hAbout}}", hAbout);
  html = html.replace("{{Retour}}", Retour);
  return html;
};

export { NavBar };
