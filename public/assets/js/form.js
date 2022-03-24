var FormTabs = {
  /**
   * Methode pour initialiser le changement d'onglet
   */
  init: function init(elem) {
    $(elem+'.tabs-container .nav-tabs li').each(function () {
      $(this).click(function () {
        if(!$(this).hasClass('active')){
          FormTabs.removeActiveClass(elem);
          FormTabs.addActiveClass(this);
        }
      })
    });
  },
  /**
   * Ajout de la classe active sur le li du tab
   * @param element
   */
  addActiveClass: function addActiveClass(element) {
    $(element).addClass('active');
  },
  /**
   * Suppression des classes active des li du tab
   */
  removeActiveClass: function (elem) {
    $(elem+'.tabs-container .nav-tabs li').each(function () {
      $(this).removeClass('active');
    });
  }
}