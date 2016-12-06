//materialize
$(document).ready(function () {
    $('select').material_select();
});

var $collectionHolder;

// setup an "add a tag" link
var $addTagLink = $('<a href="#">Add Redirect Link</i></a>');
var $newLinkLi = $("<div class='btn-flat'></div>").append($addTagLink).add("<br><br>");

jQuery(document).ready(function () {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul#collection-uri-holder');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.after($newLinkLi);

    // add a delete link to all of the existing tag form li elements
    $collectionHolder.find('li').each(function () {
        addTagFormDeleteLink($(this));
    });

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    //Trigger click on "Add Tag" btn
    $addTagLink.on('click', function (e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addTagForm($collectionHolder);
    });

    //if collection Holder is empty
    if ($collectionHolder.data("index") === 0) {
        addTagForm($collectionHolder);
    }
});

function addTagForm($collectionHolder) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $collectionHolder.append($newFormLi);

    // add a delete link to the new form
    addTagFormDeleteLink($newFormLi);
}

function addTagFormDeleteLink($tagFormLi) {
    var $deleteTagLink = $('<a href="#" class=""><i class="material-icons">delete</i></a>');
    var $delLinkLi = $('<div class="input-field col s2 center"></div>').append($deleteTagLink);
    $tagFormLi.append($delLinkLi);

    $deleteTagLink.on('click', function (e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the tag form
        $tagFormLi.remove();
    });
}