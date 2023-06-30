const app = {

    init: function() {
        console.log('app.init');
        bootstrap.init();
        app.return();
      },

    return: function() {
        const returnButton = document.querySelector('#return');
        console.log(returnButton);
        returnButton.addEventListener('click', app.handleReturn);
    },

    handleReturn: function() {
        console.log('handle return activé');
        window.history.back();
    }


}

document.addEventListener("DOMContentLoaded", app.init);
