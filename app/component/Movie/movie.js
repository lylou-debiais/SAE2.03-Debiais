let templateFile = await fetch("./component/Movie/movie.html");
let template = await templateFile.text();

let template2File = await fetch("./component/Movie/nomovie.html");
let template2 = await template2File.text();

let Movie = {};

Movie.format = function (name, image) {
    let html = template;
    html = html.replace("{{name}}", name);
    html = html.replace("{{image}}", image);
    return html;
}

Movie.formatNoMovie = function () {
    let html = template2;
    return html;
}



export { Movie };
