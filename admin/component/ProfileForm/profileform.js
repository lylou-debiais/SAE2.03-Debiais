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

/**
 * Auto-fill the profile form fields with the data from a profile object.
 * @param {Object} profil - The profile data.
 * @param {string} profil.name - The name.
 * @param {string} profil.avatar - The URL of the avatar.
 * @param {number} profil.age - The profile age.
 */
ProfileForm.autoFill = function(profil) {
  document.getElementById('name').value = profil.name || "";
  document.getElementById('avatar').value = profil.avatar || "";
  document.getElementById('age').value = profil.age || "";
};

export { ProfileForm };