let templateFile = await fetch('./component/ProfileForm/profileform.html');
let template = await templateFile.text();

let ProfileForm = {};

/**
 * Initializes the profile form by attaching the submit listener.
 * @param {Function} ajouterProfil - Callback to handle profile creation.
 */
ProfileForm.format = function(handlerSubmit) {
  let html = template;
  html = html.replace('{{handlerSubmit}}', handlerSubmit);
  return html;
};



export { ProfileForm };


