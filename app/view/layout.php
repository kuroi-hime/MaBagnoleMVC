<!DOCTYPE html>
<html lang="fr">
<?php
    use APP\model\Categorie;
    use APP\model\Vehicule;
    use APP\model\Reservation;
    use APP\model\Commentaire;
    use CONFIG\DataBase;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URDrive - Location de Véhicules</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        .hero-gradient {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=1920');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-900 overflow-x-hidden">
    <!-- navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-sm fixed top-0 left-0 right-0 z-50 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="bg-blue-600 p-2 rounded-lg">
                <i class="fas fa-car-side text-white text-xl"></i>
            </div>
            <span class="text-2xl font-black tracking-tighter uppercase">Ur<span class="text-blue-600">drive</span></span>
        </div>
        
        <div class="hidden md:flex gap-8 font-semibold text-sm uppercase tracking-wide">
            <a href="accueil" class="<?= $view == 'accueil' ? 'text-blue-600' : 'hover:text-blue-600' ?> transition">Accueil</a>
            <a href="voitures" class="<?= $view == 'voitures' ? 'text-blue-600' : 'hover:text-blue-600' ?> transition">Voitures</a>
            <a href="réservations" class="<?= $view == 'reservations' ? 'text-blue-600' : 'hover:text-blue-600' ?> transition">Mes réservation</a>
        </div>

        <div class="flex items-center gap-4 text-sm font-medium">
            <p class="hidden sm:block">Bienvenue, <span class="text-blue-600 font-bold"><?= $_SESSION['name'] ?? 'Invité' ?></span></p>
            <?php if(isset($_SESSION['name'])): ?>
            <a href="deconnexion" class="bg-blue-600 text-white px-6 py-2 rounded-full font-bold shadow-lg hover:bg-blue-700 transition">Déconnexion</a>
            <?php endif; ?>
        </div>
    </nav>

    <?= $content ?>

    <!-- footer -->
    <footer class="bg-slate-900 text-white py-20 px-6 border-t border-slate-800">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
            <div class="space-y-6">
                <h4 class="text-3xl font-black tracking-tighter">UR<span class="text-blue-500">DRIVE</span></h4>
                <p class="text-slate-400 leading-relaxed">Le leader de la location de voitures premium avec plus de 50 agences à travers le Maroc. Excellence et confort garantis.</p>
                <div class="flex gap-4">
                    <a href="#" class="w-12 h-12 bg-slate-800 rounded-2xl flex items-center justify-center hover:bg-blue-600 transition-all shadow-lg"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-12 h-12 bg-slate-800 rounded-2xl flex items-center justify-center hover:bg-blue-600 transition-all shadow-lg"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="lg:col-span-2 grid grid-cols-2 gap-8">
                <div>
                    <h5 class="font-black text-lg mb-6 uppercase tracking-widest">Navigation</h5>
                    <ul class="text-slate-400 space-y-4 font-medium">
                        <li><a href="accueil" class="hover:text-blue-500 transition">Accueil</a></li>
                        <li><a href="voitures" class="hover:text-blue-500 transition">Catalogue</a></li>
                        <li><a href="réservations" class="hover:text-blue-500 transition">Réservations</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-black text-lg mb-6 uppercase tracking-widest">Contact</h5>
                    <ul class="text-slate-400 space-y-4 font-medium">
                        <li class="flex items-center gap-3"><i class="fas fa-phone text-blue-500"></i> +212 522 00 00 00</li>
                        <li class="flex items-center gap-3"><i class="fas fa-envelope text-blue-500"></i> contact@urdrive.ma</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto mt-20 pt-8 border-t border-slate-800 text-center text-slate-500 text-sm">
            &copy; <?= date('Y') ?> URDRIVE Morocco. Tous droits réservés.
        </div>
    </footer>
</body>
</html>