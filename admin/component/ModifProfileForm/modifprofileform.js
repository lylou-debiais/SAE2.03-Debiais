let templateFile = await fetch('./component/ModifProfileForm/modifprofileform.html');
let template = await templateFile.text();

let template2File = await fetch('./component/ModifProfileForm/modifprofileform2.html');
let template_select2 = await template2File.text();

let ModifProfileForm = {};

/**
 * Initializes the profile form by attaching the submit listener.
 * @param {Function} ajouterProfil - Callback to handle profile creation.
 */
ModifProfileForm.format = function(handlerSubmit, handlerModifProfile, profile) {
  let html = template;
  html = html.replace('{{handlerSubmit}}', handlerSubmit);
  html = html.replace('{{handlerModifProfile}}', handlerModifProfile);
  

  let profilesHTML = "";
  for (let i = 0; i < profile.length; i++) {
    profilesHTML += ModifProfileForm.formatselect(profile[i].nom, profile[i].id);
    console.log(profilesHTML);
  }
  html = html.replace("{{profiles}}", profilesHTML);
  
  return html;
};

ModifProfileForm.formatselect = function (profile_name, profile_id) {
  let html = template_select2;
  html = html.replace("{{profile_name}}", profile_name);
  html = html.replace("{{profile_id}}", profile_id);

  return html;
};


/**
 * Auto-fill the profile form fields with the data from a profile object.
 * @param {Object} profil - The profile data.
 * @param {string} profil.name - The name.
 * @param {string} profil.avatar - The URL of the avatar.
 * @param {number} profil.age - The profile age.
 */
ModifProfileForm.autoFill = function(profil) {
  document.getElementById('modifname').value = profil.nom || "";
  document.getElementById('modifavatar').value = profil.avatar || "";
  document.getElementById('modifage').value = profil.age || "";
};

export { ModifProfileForm };


