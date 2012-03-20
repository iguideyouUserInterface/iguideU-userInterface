function extendCollapse () {
   var Accordion = {
  init: function() {
    var accordions = $(".accordion");

    for (var i = 0, ii = accordions.length; i < ii; i++) {
      var folds = accordions[i].childNodes;
      for (var j = 0, jj = folds.length; j < jj; j++) {
        if (folds[j].nodeType == 1) {
          Accordion.collapse(folds[j]);

          var foldLinks = folds[j].getElementsByTagName("a");
          var foldTitleLink = foldLinks[0];
          $(foldTitleLink).bind("click", Accordion.clickListener);

          for (var k = 1, kk = foldLinks.length; k < kk; k++) {
            $(foldLinks[k]).bind("focus", Accordion.focusListener);
          }
        }
      }

      if (location.hash.length > 1) {
        var activeFold = document.getElementById(location.hash.substring(1));
        if (activeFold && activeFold.parentNode == accordions[i]) {
          Accordion.expand(activeFold);
        }
      }
    }
  },

  collapse: function(fold) {
    $(fold).removeClass("expanded");
    $(fold).addClass("collapsed");
  },

  collapseAll: function(accordion) {
    var folds = accordion.childNodes;
    for (var i = 0, ii = folds.length; i < ii; i++) {
      if (folds[i].nodeType == 1) {
        Accordion.collapse(folds[i]);
      }
    }
  },

  expand: function(fold) {
    Accordion.collapseAll(fold.parentNode);
    $(fold).removeClass("collapsed");
    $(fold).addClass("expanded");
  },

  clickListener: function(event) {
    var fold = this.parentNode.parentNode;
    if ($(fold).hasClass("collapsed")) {
      Accordion.expand(fold);
    }
    else {
      Accordion.collapse(fold);
    }
    event.preventDefault();
  },

  focusListener: function(event) {
    var element = this;
    while (element.parentNode) {
      if ($(element.parentNode).hasClass("accordion")) {
        Accordion.expand(element);
        return;
      }
      element = element.parentNode;
    }
  }
};

Accordion.init();
}
