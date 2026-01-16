        <div class="flex-1">
            <div class="flex justify-between items-center gap-4 mb-6">
                <div class="flex-1 relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="search_vehicules" placeholder="Rechercher un modèle..." 
                        class="w-full pl-12 pr-4 py-3 bg-white border border-gray-100 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                </div>
            </div>

            <div id="search_vehicules_results" class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                <?php
                    $limit = 6;
                    $pageActuelle = isset($_GET['page']) ? $_GET['page'] : 1;

                    $offset = ($pageActuelle - 1) * $limit;

                    $totalVehicules = Vehicule::countVehiculesDispos($pdo);
                    $totalPages = round($totalVehicules / $limit);
                    $voituresDispos = Vehicule::paginatedVehicules($pdo, $limit, $offset);
                    foreach($voituresDispos as $vehiculedispo):
                        $cover = $vehiculedispo->images[0]->url_image ?? '../../images/defaultPic.webp';
                ?>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                    <div class="relative">
                        <img src="<?= $cover?>" alt="<?= $vehiculedispo->id_vehicule ?>" class="w-full h-48 object-cover">
                        <!-- <span class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-sm italic">tiquette</span> -->
                    </div>
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-gray-800"><?= $vehiculedispo->marque.' '.$vehiculedispo->modele ?></h3>
                            <div class="flex items-center text-yellow-500 text-sm">
                                <i class="fas fa-star"></i> <span class="ml-1 text-gray-600 font-bold"><?= number_format(Commentaire::avgNoteByCar($pdo, $vehiculedispo->id_vehicule), 1, '.', '') ?></span>
                            </div>
                        </div>
                        <div class="flex gap-4 my-4 text-gray-500 text-sm italic">
                            <span><i class="fas fa-user-friends mr-1 text-blue-500"></i> 5</span>
                            <span><i class="fas fa-briefcase mr-1 text-blue-500"></i> 2</span>
                            <span><i class="fas fa-cog mr-1 text-blue-500"></i> Auto</span>
                        </div>
                        <div class="flex items-baseline gap-1 mt-6">
                            <span class="text-2xl font-black text-gray-900">890MAD</span>
                            <span class="text-gray-500 text-sm">/jour</span>
                        </div>
                        <div class="w-full flex gap-4 text-center">
                            <a class="w-full mt-4 bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition-colors shadow-lg shadow-blue-100">
                                Voir détails
                            </a>
                            <a href="?reservation&vehicule=<?= $vehiculedispo->id_vehicule ?>" class="w-full mt-4 bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition-colors shadow-lg shadow-blue-100">
                                Réserver
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-8 flex w-full gap-4 justify-center">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?Voitures&page=<?= $i ?>"
                        class="px-5 py-3 rounded-xl font-bold transition-all <?= ($i == $pageActuelle) ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-100' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>

        </div>