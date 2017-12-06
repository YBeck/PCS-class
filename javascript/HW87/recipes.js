/*global $ */
(function () {
    "use strict";
    var recipes = $("[name ='recipes']");
    $('#listOfRecipes').change(function () {
        $('#section').empty();
        recipes.each(function (index, elem) {
            if (elem.checked) {
                $.getJSON('recipes.php', $(elem).data(), getRecipe); 
                return false; // break out of .each loop
            }      
        });
    });

    function getRecipe(recipe) {
        var li = "";
        $.each(recipe, function (i, e) {
            li += "<li class = 'list-group-item'><h4>" + e.ing_name + "<h4></li>";
        });
        var output = $('<div><div class="mx-auto mt-3 text-center">' +
            '<img class = "card-img-top mb-3 rounded" src =' + recipe[0].url + '></div>' +
            '<div class = "card-block list-group-item active">' +
            '<h4 class="card-title" id="title">' + recipe[0].rec_name + '</h4></div > ' +
            '<ul class="list-group list-group-flush"></ul></div>')
            .appendTo('#section');
        
            output.find('ul').append(li);
            output.find('img').css('width', '80%');
    }

})();