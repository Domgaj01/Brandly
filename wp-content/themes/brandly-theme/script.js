new PerformanceObserver((list) => {
    for (const e of list.getEntries()) {
      if (!e.hadRecentInput) {
        console.log('CLS+', e.value, e);
        e.sources?.forEach(s => console.log('moved:', s.node, s.previousRect, '→', s.currentRect));
      }
    }
  }).observe({type: 'layout-shift', buffered: true});

  module.exports = {
    content: ["./**/*.php", "./src/**/*.js"],
    theme: { extend: {} },
    plugins: [],
    // ak používaš dynamické triedy, pridaj safelist:
    safelist: [
      'bg-[linear-gradient(to_right,black_50%,white_50%)]'
    ]
  }