let templateFile = await fetch("./component/Movie/movie.html");
let template = await templateFile.text();

let template2File = await fetch("./component/Movie/nomovie.html");
let template2 = await template2File.text();

let template3File = await fetch("./component/Movie/nomovieage.html");
let template3 = await template3File.text();

let template4File = await fetch("./component/Movie/nomoviefavoris.html");
let template4 = await template4File.text();

let template5File = await fetch("./component/Movie/movieenavant.html");
let template5 = await template5File.text();

let template6File = await fetch("./component/Movie/nomovieenavant.html");
let template6 = await template6File.text();

let Movie = {};

Movie.format = function (handler, name, image) {
    let html = template;
    html = html.replace("{{handler}}", handler);
    html = html.replace("{{name}}", name);
    html = html.replace("{{image}}", image);
    return html;
}

Movie.formatNoMovie = function () {
    let html = template2;
    return html;
}

Movie.formatnoagemovie = function () {
    let html = template3;
    return html;
}

Movie.formatNoMovieFavoris = function () {
    let html = template4;
    return html;
}

Movie.formatMovieEnAvant = function (handler, name, image, description) {
    let html = template5;
    html = html.replace("{{handler}}", handler);
    html = html.replace("{{name}}", name);
    html = html.replace("{{image}}", image);
    html = html.replace("{{description}}", description);
    return html;
}
Movie.formatNoMovieEnAvant = function () {
    let html = template6;
    return html;
}


export { Movie };
