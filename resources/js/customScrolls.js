if (document.contains(document.getElementById('my-scrollable-content'))){
    const myScrollbar = OverlayScrollbars(document.getElementById('my-scrollable-content'), {
        // Здесь вы можете настроить параметры скролла
        scrollbars: {
            visibility: 'auto',
            autoHide: 'never',
            autoHideDelay: 1000,
            dragScrolling: true,
            clickScrolling: false
        }
    });
}
