@auth
@php
if(!isset($_GET['read'])) {
header('location: /dashboard');
}
@endphp
@endauth
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Wainwright: Casino Dog') }}
        </h2>
</x-slot>
<!-- Start Container !-->
<div class="p-6 sm:px-20 bg-white dark:bg-gray-800 bg-opacity-25">
    <!-- Start Info Block !-->
    <div class="mt-2 text-xl">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight dark:text-white">
            What is Casino Dog?
        </h2>
    </div>
    <div class="mt-2 text-gray-500 dark:text-gray-400">
        <p>Casino Dog is a simple laravel package that is altering casino games from "demo" or "fun" game sessions to real-money game sessions. Including a simple "skip result" function, so big wins can be skipped, just like is done by criminals world wide in current day.</p>
        <p class="mt-2">This should not be used in production environment (however it seems the big casino operators & providers get away with it, so up-to you). The goal is to showcase all frauds and all stuff I learn within a package to be used completely free by anyone world-wide.</p>
    </div>
    <!-- End Info Block !-->


    <!-- Start Spacer !-->
    <hr class="mt-6 mb-6" style="opacity: 20%;">
    <!-- End Spacer !-->

    <!-- Start Info Block !-->
    <div class="mt-4 text-xl">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight dark:text-white">
            What is Wainwright?
        </h2>
    </div>
    <div class="mt-2 text-gray-500 dark:text-gray-400">
        <p>Vendor tag is named after David G. Wainwright, one of biggest internet criminals in the history of the world wide web, a unforgiving cancer to anyone he touches and a big danger to the online casino industry's global integrity.</p>
        <p class="mt-2">Infamous for running various telecom scams (premium landlines), <a href="https://www.youtube.com/watch?v=8-cwTffvwWo _target="blank" class="text-indigo-500">Super Casino</a> on Channel 5 in U.K. for over 20 years, founder of <a href="https://hollywoodtv.com" class="text-indigo-500">HollywoodTV</a> (re-using the "legit" feeds to scam providers like: SA Gaming, Betgames.tv, TVBet.tv, CreedRunz), founder of <a class="text-indigo-500" href="https://www.playtech.com" _target="blank">PlayTech</a>.</p>
        <p class="mt-2">David is head of a criminal conspiracy that is focussed entirely on the scamming of players, laundry of the profits gained from such and the control of market as a whole, namely on crypto casino's.</p>
        <a href="#">
        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-500">
                <div>Read more about Wainwright</div>
                <div class="ml-1 text-indigo-500">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </div>
        </div>
        </a>
    </div>
    <!-- End Info Block !-->


    <!-- Start Spacer !-->
    <hr class="mt-6 mb-6" style="opacity: 20%;">
    <!-- End Spacer !-->

    <!-- Start Info Block !-->
    <div class="mt-4 text-xl">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight dark:text-white">
            I'm a dummy, what exactly does this tool do?
        </h2>
    </div>
    <div class="mt-2 text-gray-500 dark:text-gray-400">
        <p>There's various tricks, but the main consensus is that this tool is a simplification of the actual scams being run out there and which is a "man in the middle" concept.</p>
        <p class="mt-2">The goal of <i>Wainwright: Casino Dog</i> is to retrieve demo casino games from a provider (from whatever source) and change this in a real-money game and to implement a simple "skip result" feature to showcase skipping big win slot spins basically being skipped.</p>
        <p class="mt-2">Main goal of criminals is to use similar methods to change the content of a casino game and it's results, while remaining to look legit to end-user.</p>
    </div>
    <!-- End Info Block !-->

    <!-- Start Spacer !-->
    <hr class="mt-6 mb-6" style="opacity: 20%;">
    <!-- End Spacer !-->

    <!-- Start Info Block !-->
    <div class="mt-4 text-xl">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight dark:text-white">
            Change slotmachine content?! Why?
        </h2>
    </div>
    <div class="mt-2 text-gray-500 dark:text-gray-400">

    <p class="mt-2">Some examples of changing game content and it's purpose (actually used in the wild): <br>
    - Changing the currency symbol on game to player (like from $ to €), for example to pay less fees (games are billed on % of profit gained from game).<br><br>
    - It can be to hide the origin of games, so the provider when contacted regarding illegal gambling can shrug their shoulders (legally, ofcourse all providers are working in corporation). Like Evolution's illegal gambling ring in middle east, asia, usa through <a class="text-indigo-500" href="https://blueoceangaming.com">wirebankers.com</a> & <a class="text-indigo-500" href="https://blueoceangaming.com">game-program.com</a>.<br><br>
    - It can be to change the result of games (in the case of <a href="https://softswiss.com" target="_blank" class="text-indigo-500">Softswiss</a> on casino's like <a class="text-indigo-500" href="https://stake.com">Stake.com</a>, <a class="text-indigo-500" href="https://bitstarz.com">Bitstarz.com</a>, <a class="text-indigo-500" href="https://sportsbet.io">Sportsbet.io</a>, <a class="text-indigo-500" href="https://bc.game">BC.Game</a> and many more crypto casino's) as to not have to pay-out the big wins.<br><br>
    - It can be to gain access to games that a party does not officially have access towards.<br><br>
    - It can be to have additional <u>undocumented profit</u> as game provider flowing to the people at the top in person, out of view from capital investors of it's business holding.
    </p>
    </div>

    <!-- Start Spacer !-->
    <hr class="mt-6 mb-6" style="opacity: 20%;">
    <!-- End Spacer !-->

    <!-- Start Info Block !-->
    <div class="mt-4 text-xl">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight dark:text-white">
            You said David is a cancer to industry, so which companies should I look out for?
        </h2>
    </div>
    <div class="mt-2 text-gray-500 dark:text-gray-400">
        <p>To name a few companies directly being run by David (day-to-day): PlayTech, Gammix, EveryMatrix, AMBBet, 1x2Gaming, Quickfire, RelaxGaming, Oryx Gaming, Blue Ocean Gaming, which all completely focusses either on the direct adjustment of game outcomes or on the <a class="text-indigo-500" href="https://github.com/shlomoVIVO/telecom_centrifuge" target="_blank">laundry of the profits through semi-legit operations like the BetCity.nl in Netherlands, Kansino, 777.nl</a>.</p>
        <p class="mt-2">David can be considered the henchman for parties like Pragmatic Play (iSoftbet), SoftSwiss, Betsson Group, VIVO Gaming, Spinomenal, WhiteHatGaming, Slotegrator.pro and these all actively work together and for the same cause: scamming players for extra gain & the laundry of monies out of either illegal gambling (asia, africa).</p>
    </div>
    <!-- End Info Block !-->

    <!-- Start Spacer !-->
    <hr class="mt-6 mb-6" style="opacity: 20%;">
    <!-- End Spacer !-->

    <!-- Start Info Block !-->
    <div class="mt-4 text-xl">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight dark:text-white">
            Yeah sure m8, like the biggest operators & game providers would be that greedy, they would already make so much!
        </h2>
    </div>
    <div class="mt-2 text-gray-500 dark:text-gray-400">
        <p>Yes, they are that greedy. It is the only reason this tool & modules are out there for free, so you can be convinced yourself but also there are main frontend snippets included within Casino Dog's documentation that showcase and directly implicate <a href="https://softswiss.com">Softswiss</a>, Betsson Group and <a href="https://playtech.com">Playtech</a>.</p>
        <p class="mt-2">It is to be noted is that I'm just a guy who got pushed out of industry for not wanting to comply with this scam and who is ok at using google, I'm sure there's much much more to uncover. The main culprit is David G. Wainwright but around there is much untransparant smoke being created by these criminals in the form of constant setups of new iGaming-related companies, so plenty for anyone with an interest to find out more.</p>
    </div>
    <!-- End Info Block !-->

    <!-- Start Spacer !-->
    <hr class="mt-6 mb-6" style="opacity: 20%;">
    <!-- End Spacer !-->

    <!-- Start Info Block !-->
    <div class="mt-2 text-xl">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight dark:text-white">
            Ok, but their games are licensed legally in *INSERT COUNTRY*?!
        </h2>
    </div>
    <div class="mt-2 text-gray-500 dark:text-gray-400">
            <p>It is why it is so easy to find actual direct incriminating evidence, it is because the scam is being injected on the casino/aggregator's frontend and not on the provider's level so at most a casino can be barred from their license, while same games will remain to scam players on all other undiscovered casino's.
            <p class="mt-2">Providers make handlers so anyone can insert malicious code on their games, so that they can claim "oops it was a mistake" or a common one they use is "SSL certificates were breached! Care!". While the open handlers are looking legit from first glanse you can abuse many tools that one would consider legit use, like Google Analytics has an option to include custom .js scripts, but also CloudFlare's Zaraz make it a breeze to inject malicious .js within a iframe (even when not belonging to it's parent domain).</p>
            <p class="mt-2">In example, David's <a href="https://playtech.com" target="_blank" class="text-indigo-500">Playtech</a> casino software (be it in different names like Oryx, BlueOcean etc) is being used on pretty much all casino's within the Netherlands, this opens it up to load malicious scripts on top of total legal & licensed games.</p>
            <p class="mt-2">Reason why "demo game-sessions" are used is just a risk assessment but also because demo game results are completely undocumented, this makes sure that none of the legit capital investors will get a piece of the illegal profits - while these <a href="https://www.reuters.com/technology/swedens-evolution-loses-3-bln-market-value-illegal-gaming-accusation-2021-11-17" class="text-indigo-500" target="_blank">investors still pay for when a casino group is caught cheating</a> and even seem to <a href="https://igamingnext.com/news/exclusive-secretive-short-seller-report-wipes-e2-5bn-from-evolution-market-cap-but-is-the-report-as-explosive-as-it-seems/" target="_blank" class="text-indigo-500">intentionally scam their investors at times</a> when there is an imminent discovery or report upcoming.</p>
    </div>
    <!-- End Info Block !-->

    <!-- Start Spacer !-->
    <hr class="mt-6 mb-6" style="opacity: 20%;">
    <!-- End Spacer !-->

    <!-- Start Info Block !-->
    <div class="mt-2 text-xl">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight dark:text-white">
            So there is no remedy?
        </h2>
    </div>
    <div class="mt-2 text-gray-500 dark:text-gray-400">
            <p>Yes there is, in order to make games fair again, games should be run within a secure licensed (frontend) environment, so in the case of malpractice the game provider directly can be held accountable.</p>
            <p class="mt-2">Currently many casino's have been getting barred, but a new casino is made within the same day in that case - instead by barring game providers & aggregators instead you disable legal use of games for all other undiscovered fraud casino's that wish to stay legal.</p>
            <p class="mt-2">It is time that commissions world-wide restore trust within it's government approved licensing as in the end this will damage not only a lot of players, but all business around gambling industry like marketing, legal councils, influencers, service providers, payment providers and more importantly will damage the overall view of a country by having it's flag beared within a scamming casino.
            <p class="mt-2">I think it is in best interest of all countries world-wide to not end up with Curacao's reputation which even openly admits it cannot control the fairness of games of it's licensees. This also calls for a stricter grip on payment providers and in my opinion a payment provider serving payments for Netherlands should not be allowed to also serve casino's with a curacao license (from pov of KSA) - as Curacao openly cannot secure it's licensees (and from experience, the only thing they make sure and secure is if you have wired the yearly 15K$ license fees).</p>
            <p class="mt-2">For gambling commissions with an ounce of integrity, this means making a secure page in which game has to be run that is hosted within the gov controlled environment without outside interference. Or, it could request all game providers to include small tracking snippet (that communicates with a "this game is safe" badge on the casino's view) so casino's can retain iframe functionallity. This can be combined with the license check badge. These ideas are top of head, because this is the job of a gambling commission at it's core.</p>
            <p class="mt-2">It is telling that even <a class="text-indigo-500" href="https://www.gamblingcommission.gov.uk/news/article/suspension-of-operating-licence-everymatrix-software-limited">U.K. gambling commission tried to keep all this info contained</a>, as they have been barring some parties while not disclosing the exact reasoning behind the bar. </p>
            <p class="mt-2">This implicates they have merely been trying to save their own skin and not that of the player (trying your best to protect players and failing is something else compared to trying to sweep the whole matter under the carpet).</p>
    </div>

    <!-- Start Spacer !-->
    <hr class="mt-6 mb-6" style="opacity: 20%;">
    <!-- End Spacer !-->

    <div class="mt-4 text-xl">
        <h1 class="font-semibold text-lg text-gray-800 leading-tight dark:text-white">
            <p>In addition to this tool, after I have released atleast 10+ game provider modules support on this tool (1-3 months max.) is to start working on an independent game-content scanner that anyone can run to check if any known altering is done on a game simply by pasting a game's HTML content from your browser within this scanner.
            <p class="mt-4" style="opacity: 25%;">It is my personal pledge (Ryan West) to provide any tooling/software showcasing any type of casino fraud will remain completely free and open source (for a full 100% without any premium functionallity). I want to ask anyone that will build on this, or have seen the light and start to create their own variants of this abuse - to not abuse fair game providers (if they exist would be the smaller ones) that are not aware and only use this on game providers that have "opened the gate" on purpose for this usecase.</p>
        </h1>
     </div>
    <div class="mt-6 text-gray-500 dark:text-gray-400">
    <!-- End Spacer !-->

</div>
<!-- End Container !-->
</div>
