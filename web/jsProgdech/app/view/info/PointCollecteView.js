/**
 * ViewModel de l'information sur un point de collecte.
 **/
Ext.define('jsProgdech.view.info.PointCollecteView', {
    extend: 'Ext.app.ViewModel',

    alias: 'viewmodel.infoPointCollecte',

    // Données par défault.
    data: {
        reference: '',
        date_creation: '',
        createur: ''
    }
});
