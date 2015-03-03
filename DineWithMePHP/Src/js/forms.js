/**
 * Created by Dylan on 2/03/2015.
 */

function showEventAddForm()
{
    alert("foo");
    /*
     var form = document.createElement('form');
     var fieldset = document.createElement('fieldset');

     var hostLabel = document.createElement('label');
     hostLabel.textContent="Host";
     var hostTextField = document.createElement("input");
     hostTextField.setAttribute("type","text");
     hostLabel.appendChild(hostTextField);




     // add to fieldset & fieldset to form
     fieldset.appendChild(hostLabel);
     form.appendChild(fieldset);
     document.getElementsByTagName('body')[0].appendChild(form);*/
}

function showRecipeAddForm() {
    var addbutton = document.getElementById('addbutton');
    if (addbutton.getAttribute('value') === '+')
    {
        var form = document.createElement("form");
        var fieldset = document.createElement('fieldset');
        form.appendChild(fieldset);
        form.setAttribute('method', "post");
        form.setAttribute('action', "index.php?action=addRecipe");
        form.setAttribute('id','inputForm');
        // name
        var nameLabel = document.createElement("label");
        var nameTextField = document.createElement('input');
        nameTextField.setAttribute('type', 'text');
        nameTextField.setAttribute('name', 'name');
        nameLabel.textContent = 'Name';
        nameLabel.appendChild(nameTextField);
        fieldset.appendChild(nameLabel);
        //people

        var peopleLabel = document.createElement('label');
        var peopleTextField = document.createElement('input');
        peopleTextField.setAttribute('name', 'people');
        peopleLabel.textContent = '# of people';
        peopleLabel.appendChild(peopleTextField);
        fieldset.appendChild(peopleLabel);

        // button
        var button = document.createElement('input');
        button.setAttribute('type', 'submit');
        button.setAttribute('value', 'save');
        fieldset.appendChild(button);

        // add form to document
        document.getElementsByTagName('body')[0].appendChild(form);

        // alter the dom button to show '-'
        var addbutton = document.getElementById('addbutton');
        addbutton.setAttribute('value', '-');
    }
    else
    {
        // remove them?
        var form = document.getElementById('inputForm');
        // remove every node under the form (otherwise they are floating around in DOM somewhere, because DOM.
        while(form.firstChild){
            form.removeChild(form.firstChild);
        }
        document.getElementsByTagName('body')[0].removeChild(form);
        addbutton.setAttribute('value', '+');
    }

}

