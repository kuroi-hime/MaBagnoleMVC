    <section class="py-12 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">VOTRE SATISFACTION, NOTRE PRIORITÉ</h2>
                <div class="flex justify-center gap-1 mb-2">
                    <?php for($i=0; $i<5; $i++): ?><i class="fas fa-star<?= $i<$noteMoy ? ' text-yellow-400':'' ?>"></i><?php endfor; ?>
                </div>
                <p class="text-slate-500 font-bold uppercase text-sm tracking-widest">Basé sur +<?= $avis ?> avis vérifiés</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php foreach($commentaires as $commentaire): ?>
                <div class="bg-slate-50 p-10 rounded-[3rem] border border-slate-100 relative">
                    <i class="fas fa-quote-left text-blue-200 text-5xl absolute top-8 left-8 opacity-50"></i>
                    <p class="relative z-10 text-slate-700 leading-relaxed text-lg italic mb-8">
                        "<?= $commentaire->contenu ?>"
                    </p>
                    <div class="flex items-center gap-4">
                        <div>
                            <h4 class="font-bold text-slate-900">Marc-Antoine D.</h4><!-- nom client -->
                            <span class="text-xs text-blue-600 font-bold uppercase tracking-tighter">Client Vérifié</span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>