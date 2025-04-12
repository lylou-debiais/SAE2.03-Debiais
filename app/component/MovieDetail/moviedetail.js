let templateFile = await fetch("./component/MovieDetail/moviedetail.html");
let template = await templateFile.text();


let MovieDetail = {};

MovieDetail.format = function (id, name, director, category, year, min_age, image, description, trailer, profile_id)  {
    let html = template;
    html = html.replace("{{id}}", id);
    html = html.replace("{{name}}", name);
    html = html.replace("{{director}}", director);
    html = html.replace("{{category}}", category);
    html = html.replace("{{year}}", year);
    html = html.replace("{{min_age}}", min_age);
    html = html.replace("{{image}}", image);
    html = html.replace("{{description}}", description);
    html = html.replace("{{trailer}}", trailer);
    html = html.replace("{{profile_id}}", profile_id);
    return html;
}







export { MovieDetail };
