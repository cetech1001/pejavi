$(() => {
//    Attach year to copyright footer
    const year = new Date().getFullYear();
    const copyrightYearElement = $("#copyright-year");
    copyrightYearElement.text(year);

//    Live Auction Timer
    const timer = $("#live-auction-timer");
    const endTime = new Date();
    endTime.setTime(endTime.getTime() + (120 * 60 * 1000));
    setInterval(() => {
        const now = new Date().getTime();
        const timeLeft = endTime.getTime() - now;

        // const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
        timer.text(
            "Time left: "
            + String(hours).padStart(2, '0')
            + ":"
            + String(minutes).padStart(2, '0')
            + ":"
            + String(seconds).padStart(2, '0')
        );
    }, 1000);
});