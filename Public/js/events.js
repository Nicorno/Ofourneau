
/*================ INGREDIENTS EVENTS ======================*/

// Add a ingredient of recipe
var addIngredientBtn = document.getElementById('btn-add-ingredient');
if (addIngredientBtn) {

    addIngredientBtn.addEventListener('click', function() {

        // Get new ingredient
        let ingredients = document.getElementById('edit-ingredient');

        if (typeof(ingredients.lastElementChild) != 'undefined' && ingredients.lastElementChild != null) {
            console.log(ingredients.lastElementChild);
            var lastIngredient = ingredients.lastElementChild.firstElementChild.textContent;
            var newNbIngredient = parseInt(lastIngredient.substring(14)) + 1;

        } else {
            var newNbIngredient = 1;
        }
        let newIngredient = 'Ingrédient n° ' + newNbIngredient;

        // Create new form-group
        let div = document.createElement('div');
        div.setAttribute('class', 'form-group');

        // Create new label
        let label = document.createElement('label');
        label.textContent = newIngredient;

        // Create new textarea
        let input = document.createElement('input');
        input.setAttribute('class', 'form-control');
        input.setAttribute('type', 'text');
        input.setAttribute('name', 'ingredient_'+newNbIngredient);

        // Append label and texarea in div
        div.appendChild(label);
        div.appendChild(input);

        // Append new step in preparation
        ingredients.appendChild(div);
    });
}



// Delete a step of recipe preparation
var delIngredientBtn = document.getElementById('btn-del-ingredient');
if (delIngredientBtn) {

    delIngredientBtn.addEventListener('click', function() {

        // Get new step
        let ingredients = document.getElementById('edit-ingredient');
        let lastIngredient = ingredients.removeChild(ingredients.lastElementChild);
    });
}








/*================ STEPS EVENTS ======================*/

// Add a step of recipe preparation
var addStepBtn = document.getElementById('btn-add-step');
if (addStepBtn) {

    addStepBtn.addEventListener('click', function() {

        // Get new step
        let steps = document.getElementById('edit-preparation');

        if (typeof(steps.lastElementChild) != 'undefined' && steps.lastElementChild != null) {
            var lastStep = steps.lastElementChild.firstElementChild.textContent;
            var newNbStep = parseInt(lastStep.substring(6)) + 1;

        } else {
            var newNbStep = 1;
        }
        let newStep = 'Étape ' + newNbStep;

        // Create new form-group
        let div = document.createElement('div');
        div.setAttribute('class', 'form-group');

        // Create new label
        let label = document.createElement('label');
        label.textContent = newStep;

        // Create new textarea
        let textarea = document.createElement('textarea');
        textarea.setAttribute('class', 'form-control');
        textarea.setAttribute('type', 'texarea');
        textarea.setAttribute('name', 'step_'+newNbStep);

        // Append label and texarea in div
        div.appendChild(label);
        div.appendChild(textarea);

        // Append new step in preparation
        steps.appendChild(div);
    });
}



// Delete a step of recipe preparation
var delStepBtn = document.getElementById('btn-del-step');
if (delStepBtn) {

    delStepBtn.addEventListener('click', function() {

        // Get new step
        let steps = document.getElementById('edit-preparation');
        let lastStep = steps.removeChild(steps.lastElementChild);
    });
}





/*================ SUBMIT EDIT EVENT ======================*/

var delRecipe = document.getElementById('del-recipe');
if (delRecipe) {

    delRecipe.addEventListener('click', function() {
        confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');
    });
}
