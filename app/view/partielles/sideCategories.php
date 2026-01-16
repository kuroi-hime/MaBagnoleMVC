        <aside class="w-full md:w-64 space-y-8">
            <div>
                <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                    <i class="fas fa-sliders-h text-blue-600"></i> Filtres
                </h3>
                
                <div class="space-y-6">
                    <div>
                        <p class="font-semibold text-sm mb-3">Catégories</p>
                        <div class="space-y-2">
                            <?php foreach($categories as $categorie): ?>
                            <label class="flex items-center gap-2 text-gray-600 cursor-pointer"><input type="radio" name="categorie" class="rounded text-blue-600"> <?= $categorie->nom_categorie ?></label>
                            <input type="hidden" name="id_categorie" value="<?= $categorie->id_categorie ?>">
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </aside>