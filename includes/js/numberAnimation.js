function animateValues() {
    const elements = document.querySelectorAll('.amount-animate');

    elements.forEach(element => {
        const label = element.getAttribute('data-label');
        const value = '0';

        let start = { value: 0 };
        let end = { value: parseFloat(label.replace(',', '.')) };

        const tween = new TWEEN.Tween(start)
            .to(end, 2000)
            .easing(TWEEN.Easing.Quadratic.InOut)
            .onUpdate(() => {
                const value = Math.round(start.value);
                element.textContent = value;
            });

        tween.start();
    });

    function animate() {
        requestAnimationFrame(animate);
        TWEEN.update();
    }

    animate();
}

animateValues();



function animateEuroValuesWithDecimals() {
    const elements = document.querySelectorAll('.euro-animation');

    elements.forEach((element) => {
        const label = parseFloat(element.getAttribute('data-label').replace(',', '.')).toFixed(2);
        const start = { value: 0 };

        const tween = new TWEEN.Tween(start)
            .to({ value: label }, 2000)
            .easing(TWEEN.Easing.Quadratic.InOut)
            .onUpdate(() => {
                const value = `€${start.value.toFixed(2)}`.replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
                element.textContent = value;
            });

        tween.start();
    });
}