/**
 * ViewModel de l'information sur les communes sélectionnées.
 **/
Ext.define('jsProgdech.view.info.CommunesView', {
    extend: 'Ext.app.ViewModel',

    alias: 'viewmodel.infoCommunes',

    // Données par défault.
    data: {
        countCommune: 0,
        countPointsCollecte: 0
    }
});
