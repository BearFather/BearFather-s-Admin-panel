rdiff-backup uses time strings in two  places.   Firstly,  all  of  the<br>
       increment  files rdiff-backup creates will have the time in their file-<br>
       names in  the  w3  datetime  format  as  described  in  a  w3  note  at<br>
       http://www.w3.org/TR/NOTE-datetime.     Basically    they   look   like<br>
       "2001-07-15T04:09:38-07:00", which  means  what  it  looks  like.   The<br>
       "-07:00" section means the time zone is 7 hours behind UTC.<br>
<br>
       Secondly, the -r, --restore-as-of, and --remove-older-than options take<br>
       a time string, which can be given in any of several formats:<br>
<br>
       1.     the string "now" (refers to the current time)<br>
<br>
       2.     a sequences of digits, like "123456890" (indicating the time  in<br>
              seconds after the epoch)<br>
<br>
       3.     A string like "2002-01-25T07:00:00+02:00" in datetime format<br>
<br><b>
       4.     An interval, which is a number followed by one of the characters<br>
              s, m, h, D, W, M, or  Y  (indicating  seconds,  minutes,  hours,<br>
              days, weeks, months, or years respectively), or a series of such<br>
              pairs.  In this case the string refers to the time that preceded<br>
              the  current  time by the length of the interval.  For instance,<br>
              "1h78m" indicates the time that was one hour and 78 minutes ago.<br>
              The calendar here is unsophisticated: a month is always 30 days,<br>
              a year is always 365 days, and a day is always 86400 seconds.<br>
<br></b>
       5.     A date format of the form YYYY/MM/DD, YYYY-MM-DD, MM/DD/YYYY, or<br>
              MM-DD-YYYY,  which  indicates  midnight  on the day in question,<br>
              relative  to  the  current  timezone  settings.   For  instance,<br>
              "2002/3/5",  "03-05-2002",  and  "2002-3-05" all mean March 5th,<br>
              2002.<br>
<br>
       6.     A backup session specification which is a  non-negative  integer<br>
              followed  by  'B'.  For instance, '0B' specifies the time of the<br>
              current mirror, and '3B' specifies the time of  the  3rd  newest<br>
              increment.<br>
