/**
 * ViewModel de l'information sur un point de collecte
 **/
Ext.define('jsProgdech.view.info.PointCollecteView', {
    extend: 'Ext.app.ViewModel',

    alias: 'viewmodel.infoPointCollecte',

    // Données par défault.
    data: {
        countCommune: 0,
        countPointsCollecte: 0,
        superficie: 0,
        population: 0,
        densite: 0
    }
});

