
    <section class="relative min-h-screen flex flex-col pt-20 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 hero-gradient opacity-60"></div>
        <div class="relative flex-grow flex flex-col items-center justify-center text-center text-white px-4 z-10">
            <div class="max-w-4xl"> 
                <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">Roulez vers votre <br><span class="text-blue-500">prochaine aventure</span></h1>
                <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto mb-10">Large sélection de véhicules premium au Maroc. Réservation instantanée et service 24/7.</p>
                <a href="voitures" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-bold rounded-full hover:scale-105 transition-all shadow-xl">Réserver dès maintenant <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
            </div>
        </div>
    </section>
    <!-- Extrait des catégories -->
    <?= $sectionCategories ?>
    
    <!-- Top véhicules -->
    <?= $sectionVehicules ?>
    
    <!-- Avis utilisateurs -->
    <?= $sectionAvis ?>