// Lógica para cambiar entre pestañas
document.querySelectorAll(".tab-link").forEach((tab) => {
    tab.addEventListener("click", function () {
        document.querySelectorAll(".tab-content").forEach((content) => content.classList.add("hidden"));
        document.getElementById(this.dataset.tab).classList.remove("hidden");

        document.querySelectorAll(".tab-link").forEach((t) => t.classList.remove("border-green-500", "text-black"));
        this.classList.add("border-green-500", "text-black");
    });
});

// Mostrar u ocultar menú móvil
document.getElementById('mobile-menu-button').addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
});

// Mostrar u ocultar submenú en móviles
document.getElementById('submenu-toggle').addEventListener('click', function() {
    document.getElementById('submenu').classList.toggle('hidden');
});

// scripts. VE3NTANA MODAL CARRITO
document.getElementById('cart-button').addEventListener('click', function() {
    document.getElementById('cart-modal').classList.toggle('translate-x-full');
    document.getElementById('overlay').classList.toggle('hidden');
});

document.getElementById('overlay').addEventListener('click', function() {
    document.getElementById('cart-modal').classList.add('translate-x-full');
    document.getElementById('overlay').classList.add('hidden');
});

// Submenu toggle with animation
document.getElementById('nosotros-button').addEventListener('click', function() {
    const menu = document.getElementById('nosotros-menu');
    menu.classList.toggle('hidden');
    menu.classList.toggle('opacity-0');
    menu.classList.toggle('opacity-100');
});

document.getElementById('accesorios-button').addEventListener('click', function() {
    const menu = document.getElementById('accesorios-menu');
    menu.classList.toggle('hidden');
    menu.classList.toggle('opacity-0');
    menu.classList.toggle('opacity-100');
});

//Filtros
document.getElementById('filter-toggle').addEventListener('click', function() {
    document.getElementById('filters').classList.toggle('hidden');
});

document.getElementById('mobile-menu-button').onclick = function() {
    var menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
};
