<style>
    #realtime-notification {
        animation: fadeinout 6s forwards;
        text-align: center;
        font-weight: bold;
        cursor: pointer;
    }

    @keyframes fadeinout {
        0% { opacity: 0; transform: translateY(-100%); }
        10% { opacity: 1; transform: translateY(0); }
        90% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(-100%); }
    }
</style>
<div id="realtime-notification"
     class="position-fixed top-0 start-50 translate-middle-x alert alert-info shadow-sm"
     style="display: none; z-index: 1055; width: 300px;">
    <i class="fa fa-bell"></i> <span id="notification-message">You have a new notification!</span>
</div>
