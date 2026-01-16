    <section class="py-12 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-900 uppercase tracking-tight">Parcourez par style</h2>
                <div class="h-1.5 w-20 bg-blue-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-<?= $min ?> gap-8">
                <?php for($i=0; $i< $min; $i++): ?>
                    <div class="group relative bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="mb-5 rounded-2xl bg-blue-50 p-4 w-fit text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <i class="fas fa-tags text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-2"><?= $categories[$i]->nom_categorie ?></h3>
                        <p class="text-slate-500 leading-relaxed"><?= $categories[$i]->description ?></p>
                        <a href="vehicules?cat=<?= $categories[$i]->id_categorie ?>" class="absolute inset-0 z-10" aria-label="Voir <?= $categories[$i]->nom_categorie ?>"></a>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="mt-16 text-center">
                <a href="voitures" class="px-8 py-3 border-2 border-blue-600 text-blue-600 font-bold rounded-full hover:bg-blue-600 hover:text-white transition-all">
                    Voir plus
                </a>
            </div>
        </div>
    </section>