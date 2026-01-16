    <section class="pb-12 bg-slate-50 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <h2 class="text-4xl font-black text-slate-900">MODÈLES VEDETTES</h2>
                    <p class="mt-3 text-slate-600 text-lg">L'excellence automobile à portée de main.</p>
                </div>
                <a href="voitures" class="bg-blue-600 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-200">
                    Voir tout l'inventaire
                </a>
            </div>

            <!-- carrousel horizontal. -->
            <div class="relative px-4 group max-w-7xl mx-auto">
                <button onclick="scrollGrid(-1)" 
                        class="absolute -left-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 flex items-center justify-center bg-white border border-slate-100 rounded-full shadow-xl text-slate-900 hover:bg-blue-600 hover:text-white transition-all">
                    <span class="material-symbols-outlined text-2xl">chevron_left</span>
                </button>

                <div id="vehicleGrid" class="flex gap-10 overflow-x-auto scroll-smooth no-scrollbar snap-x snap-mandatory">
                    <?php foreach($vehicules as $vehicule): ?>
                    <div class="min-w-full md:min-w-[31%] snap-start mb-4">
                        <div class="group/card bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all h-full">
                            <div class="relative h-72 overflow-hidden">
                                <img src="<?= $vehicule->images[0]->url_image ?? 'public/images/defaultPic.webp' ?>" alt="Vehicle" class="w-full h-full object-cover group-hover/card:scale-110 transition-transform duration-700">
                                <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-black text-blue-600 shadow-sm">DISPONIBLE</div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-xl font-bold text-slate-900"><?= $vehicule->marque.' '.$vehicule->modele ?></h3>
                                    <span class="text-blue-600 text-l font-black"><?= $vehicule->prix ?>MAD<span class="text-xs text-slate-400 font-medium">/j</span></span>
                                </div>
                                <!-- <div class="flex gap-6 text-sm text-slate-500 mb-8 font-medium">
                                    <span class="flex items-center gap-2"><i class="fas fa-bolt text-blue-500"></i> Électrique</span>
                                    <span class="flex items-center gap-2"><i class="fas fa-cog text-blue-500"></i> Auto</span>
                                </div> -->
                                <a href="vehicule?id=<?= $vehicule->id_vehicule ?>" class="block w-full text-center bg-slate-900 text-white py-2 rounded-2xl font-bold hover:bg-blue-600 transition-colors">Détails du véhicule</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <button onclick="scrollGrid(1)" 
                        class="absolute -right-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 flex items-center justify-center bg-white border border-slate-100 rounded-full shadow-xl text-slate-900 hover:bg-blue-600 hover:text-white transition-all">
                    <span class="material-symbols-outlined text-2xl">chevron_right</span>
                </button>
            </div>

        <style>
            /* Cache la barre de scroll pour un look clean */
            .no-scrollbar::-webkit-scrollbar { display: none; }
            .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        </style>

        <script>
            function scrollGrid(direction) {
                const grid = document.getElementById('vehicleGrid');
                // On calcule la largeur d'une carte (y compris le gap)
                const cardWidth = grid.querySelector('div').offsetWidth + 40; // 40 est le gap-10 de Tailwind
                
                grid.scrollBy({
                    left: direction * cardWidth,
                    behavior: 'smooth'
                });
            }
        </script>


        </div>
    </section>