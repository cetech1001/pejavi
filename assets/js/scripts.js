$(() => {
//    Attach year to copyright footer
    const year = new Date().getFullYear();
    const copyrightYearElement = $("#copyright-year");
    copyrightYearElement.text(year);
});