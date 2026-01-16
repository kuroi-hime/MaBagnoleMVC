    <section class="py-24 px-6 bg-slate-50">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-4xl font-black text-slate-900 mb-12">MES RÉSERVATIONS</h2>

            <div class="space-y-6">
                <?php if(empty($reservations)): ?>
                    <p class="text-center text-slate-500">Vous n'avez aucune réservation.</p>
                <?php endif; ?>

                <?php foreach($reservations as $res): ?> 
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex flex-col md:flex-row gap-8 items-center">
                        <img src="<?= htmlspecialchars($res->image) ?>" class="w-40 h-28 object-cover rounded-2xl bg-gray-100">

                        <div class="flex-grow">
                            <h3 class="text-xl font-bold text-slate-800"><?= htmlspecialchars($res->modele) ?></h3>
                            <p class="text-sm text-slate-500">
                                <span class="font-semibold">Départ :</span> <?= date('d/m/Y', strtotime($res->date_debut)) ?><br>
                                <span class="font-semibold">Durée :</span> <?= $res->duree ?> jours
                            </p>
                            <span class="inline-block mt-2 px-3 py-1 rounded-full text-xs font-bold 
                                <?= $res->statut == 'terminer' ? 'bg-green-100 text-green-600' : 'bg-blue-100 text-blue-600' ?>">
                                <?= strtoupper($res->statut) ?>
                            </span>
                        </div>

                        <div class="w-full md:w-80 border-t md:border-t-0 md:border-l border-slate-100 pt-6 md:pt-0 md:pl-8">
                            
                            <?php if($res->statut == 'terminer'): ?>
                                
                                <?php if($res->note): // Déjà commenté ?>
                                    <div class="bg-slate-50 p-4 rounded-2xl">
                                        <div class="flex text-yellow-400 mb-2">
                                            <?php for($i=0; $i<$res->note; $i++): ?><i class="fas fa-star text-xs"></i><?php endfor; ?>
                                        </div>
                                        <p class="text-sm text-slate-600 italic">"<?= htmlspecialchars($res->texte_avis) ?>"</p>
                                    </div>

                                <?php else: // Formulaire ?>
                                    <form action="../actions/ajouter_avis.php" method="POST" class="space-y-3">
                                        <input type="hidden" name="vehicule_id" value="<?= $res->vehicule_id ?>">
                                        <select name="note" class="w-full text-sm border-none bg-slate-100 rounded-lg p-2" required>
                                            <option value="">Note / 5</option>
                                            <option value="5">5 - Excellent</option>
                                            <option value="4">4 - Très bien</option>
                                            <option value="3">3 - Moyen</option>
                                            <option value="2">2 - Déçu</option>
                                            <option value="1">1 - Horrible</option>
                                        </select>
                                        <textarea name="contenu" placeholder="Votre avis..." class="w-full text-sm bg-slate-100 border-none rounded-xl p-3 h-20" required></textarea>
                                        <button type="submit" class="w-full bg-blue-600 text-white text-xs font-bold py-2 rounded-lg hover:bg-blue-700 transition">PUBLIER</button>
                                    </form>
                                <?php endif; ?>

                            <?php else: ?>
                                <p class="text-slate-400 text-sm italic text-center">
                                    <i class="fas fa-lock mr-2"></i>Avis disponible après le trajet
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>