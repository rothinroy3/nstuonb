<?php $j=1; ?>
@foreach($products as $rws)
    <?php $j++; ?>
      <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white"style="background: #326BAE !important;">
              <i class="material-icons">assignment</i>
            </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text" style="font-size: 13px;
                font-family: sans-serif;margin-bottom: 10px">
                <h4>{{ $rws->vc_notice_name }}</h4>
                {{ $rws->vc_notice_details }}

                <p style="padding-top: 10px;"> Date : {{ $rws->created_at }}</p>
              </div>
              <div class="mdl-card__actions">
                <button id="show-infovcp<?php echo $j;?>" class="mdl-button mdl-js-button mdl-button--accent">View Message</button>             
                 </div>
            </div>
          </section>
          <script>
            
            $('#show-infovcp<?php echo $j;?>').click(function () {
                    showDialog({
                      title: 'Physical Notice<?php echo $j?>',
                      text: '<div><iframe src="{{  url("/uploads/test/vc/notice/".$rws->vc_notice_content) }}"style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 100%; min-height: 450px;"></iframe></div>',
                       negative: {
                                title: 'Cancel'
                            },
                  })
              });
          </script>
@endforeach
{{ $products->links() }}


