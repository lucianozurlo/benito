/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at https://getid3.sourceforge.net                 //
//            or https://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////

*****************************************************************
*****************************************************************

   getID3() is released under multiple licenses. You may choose
   from the following licenses, and use getID3 according to the
   terms of the license most suitable to your project.

GNU GPL: https://gnu.org/licenses/gpl.html                   (v3)
         https://gnu.org/licenses/old-licenses/gpl-2.0.html  (v2)
         https://gnu.org/licenses/old-licenses/gpl-1.0.html  (v1)

GNU LGPL: https://gnu.org/licenses/lgpl.html                 (v3)

Mozilla MPL: https://www.mozilla.org/MPL/2.0/                 (v2)

getID3 Commercial License: https://getid3.org/#gCL (payment required)

*****************************************************************
*****************************************************************
Copies of each of the above licenses are included in the 'licenses'
directory of the getID3 distribution.


       +---------------------------------------------+
       | If you want to donate, there is a link on   |
       | https://www.getid3.org for PayPal donations. |
       +---------------------------------------------+


Quick Start
===========================================================================

Q: How can I check that getID3() works on my server/files?
A: Unzip getID3() to a directory, then access /demos/demo.browse.php



Support
===========================================================================

Q: I have a question, or I found a bug. What do I do?
A: The preferred method of support requests and/or bug reports is the
   forum at https://support.getid3.org/



Sourceforge Notification
===========================================================================

It's highly recommended that you sign up for notification from
Sourceforge for when new versions are released. Please visit:
https://sourceforge.net/project/showfiles.php?group_id=55859
and click the little "monitor package" icon/link.  If you're
previously signed up for the mailing list, be aware that it has
been discontinued, only the automated Sourceforge notification
will be used from now on.



What does getID3() do?
===========================================================================

Reads & parses (to varying degrees):
 ¤ tags:
  * APE (v1 and v2)
  * ID3v1 (& ID3v1.1)
  * ID3v2 (v2.4, v2.3, v2.2)
  * Lyrics3 (v1 & v2)

 ¤ audio-lossy:
  * MP3/MP2/MP1
  * MPC / Musepack
  * Ogg (Vorbis, OggFLAC, Speex)
  * AAC / MP4
  * AC3
  * DTS
  * RealAudio
  * Speex
  * DSS
  * VQF

 ¤ audio-lossless:
  * AIFF
  * AU
  * Bonk
  * CD-audio (*.cda)
  * FLAC
  * LA (Lossless Audio)
  * LiteWave
  * LPAC
  * MIDI
  * Monkey's Audio
  * OptimFROG
  * RKAU
  * Shorten
  * TTA
  * VOC
  * WAV (RIFF)
  * WavPack

 ¤ audio-video:
  * ASF: ASF, Windows Media Audio (WMA), Windows Media Video (WMV)
  * AVI (RIFF)
  * Flash
  * Matroska (MKV)
  * MPEG-1 / MPEG-2
  * NSV (Nullsoft Streaming Video)
  * Quicktime (including MP4)
  * RealVideo

 ¤ still image:
  * BMP
  * GIF
  * JPEG
  * PNG
  * TIFF
  * SWF (Flash)
  * PhotoCD

 ¤ data:
  * ISO-9660 CD-ROM image (directory structure)
  * SZIP (limited support)
  * ZIP (directory structure)
  * TAR
  * CUE


Writes:
  * ID3v1 (& ID3v1.1)
  * ID3v2 (v2.3 & v2.4)
  * VorbisComment on OggVorbis
  * VorbisComment on FLAC (not OggFLAC)
  * APE v2
  * Lyrics3 (delete only)



Requirements
===========================================================================

* PHP 4.2.0 up to 5.2.x for getID3() 1.7.x (and earlier)
* PHP 5.0.5 (or higher) for getID3() 1.8.x (and up)
* PHP 5.0.5 (or higher) for getID3() 2.0.x (and up)
* at least 4MB memory for PHP. 8MB or more is highly recommended.
  12MB is required with all modules loaded.



Usage
===========================================================================

See /demos/demo.basic.php for a very basic use of getID3() with no
fancy output, just scanning one file.

See structure.txt for the returned data structure.

*>  For an example of a complete directory-browsing,       <*
*>  file-scanning implementation of getID3(), please run   <*
*>  /demos/demo.browse.php                                 <*

See /demos/demo.mysql.php for a sample recursive scanning code that
scans every file in a given directory, and all sub-directories, stores
the results in a database and allows various analysis / maintenance
operations

To analyze remote files over HTTP or FTP you need to copy the file
locally first before running getID3(). Your code would look something
like this:

// Copy remote file locally to scan with getID3()
$remotefilename = 'https://www.example.com/filename.mp3';
if ($fp_remote = fopen($remotefilename, 'rb')) {
    $localtempfilename = tempnam('/tmp', 'getID3');
    if ($fp_local = fopen($localtempfilename, 'wb')) {
        while ($buffer = fread($fp_remote, 8192)) {
            fwrite($fp_local, $buffer);
        }
        fclose($fp_local);

		// Initialize getID3 engine
		$getID3 = new getID3;

		$ThisFileInfo = $getID3->analyze($filename);

        // Delete temporary file
        unlink($localtempfilename);
    }
    fclose($fp_remote);
}


See /demos/demo.write.php for how to write tags.



What does the returned data structure look like?
===========================================================================

See structure.txt

It is recommended that you look at the output of
/demos/demo.browse.php scanning the file(s) you're interested in to
confirm what data is actually returned for any particular filetype in
general, and your files in particular, as the actual data returned
may vary considerably depending on what information is available in
the file itself.



Notes
===========================================================================

getID3() 1.x:
If the format parser encounters a critical problem, it will return
something in $fileinfo['error'], describing the encountered error. If
a less critical error or notice is generated it will appear in
$fileinfo['warning']. Both keys may contain more than one warning or
error. If something is returned in ['error'] then the file was not
correctly parsed and returned data may or may not be correct and/or
complete. If something is returned in ['warning'] (and not ['error'])
then the data that is returned is OK - usually getID3() is reporting
errors in the file that have been worked around due to known bugs in
other programs. Some warnings may indicate that the data that is
returned is OK but that some data could not be extracted due to
errors in the file.

getID3() 2.x:
See above except errors are thrown (so you will only get one error).



Disclaimer
===========================================================================

getID3() has been tested on many systems, on many types of files,
under many operating systems, and is generally believe to be stable
and safe. That being said, there is still the chance there is an
undiscovered and/or unfixed bug that may potentially corrupt your
file, especially within the writing functions. By using getID3() you
agree that it's not my fault if any of your files are corrupted.
In fact, I'm not liable for anything :)



License
===========================================================================

GNU General Public License - see license.txt

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to:
Free Software Foundation, Inc.
59 Temple Place - Suite 330
Boston, MA  02111-1307, USA.

FAQ:
Q: Can I use getID3() in my program? Do I need a commercial license?
A: You're generally free to use getID3 however you see fit. The only
   case in which you would require a commercial license is if you're
   selling your closed-source program that integrates getID3. If you
   sell your program including a copy of getID3, that's fine as long
   as you include a copy of the sourcecode when you sell it.  Or you
   can distribute your code without getID3 and say "download it from
   getid3.sourceforge.net"



Why is it called "getID3()" if it does so much more than just that?
===========================================================================

v0.1 did in fact just do that. I don't have a copy of code that old, but I
could essentially write it today with a one-line function:
  function getID3($filename) { return unpack('a3TAG/a30title/a30artist/a30album/a4year/a28comment/c1track/c1genreid', substr(file_get_contents($filename), -128)); }


Future Plans
===========================================================================
https://www.getid3.org/phpBB3/viewforum.php?f=7

* Better support for MP4 container format
* Scan for appended ID3v2 tag at end of file per ID3v2.4 specs (Section 5.0)
* Support for JPEG-2000 (https://www.morgan-multimedia.com/jpeg2000_overview.htm)
* Support for MOD (mod/stm/s3m/it/xm/mtm/ult/669)
* Support for ACE (thanks Vince)
* Support for Ogg other than Vorbis, Speex and OggFlac (ie. Ogg+Xvid)
* Ability to create Xing/LAME VBR header for VBR MP3s that are missing VBR header
* Ability to "clean" ID3v2 padding (replace invalid padding with valid padding)
* Warn if MP3s change version mid-stream (in full-scan mode)
* check for corrupt/broken mid-file MP3 streams in histogram scan
* Support for lossless-compression formats
  (https://www.firstpr.com.au/audiocomp/lossless/#Links)
  (https://compression.ca/act-sound.html)
  (https://web.inter.nl.net/users/hvdh/lossless/lossless.htm)
* Support for RIFF-INFO chunks
  * https://lotto.st-andrews.ac.uk/~njh/tag_interchange.html
    (thanks Nick Humfrey <njhØsurgeradio*co*uk>)
  * https://abcavi.narod.ru/sof/abcavi/infotags.htm
    (thanks Kibi)
* Better support for Bink video
* https://www.hr/josip/DSP/AudioFile2.html
* https://www.pcisys.net/~melanson/codecs/
* Detect mp3PRO
* Support for PSD
* Support for JPC
* Support for JP2
* Support for JPX
* Support for JB2
* Support for IFF
* Support for ICO
* Support for ANI
* Support for EXE (comments, author, etc) (thanks p*quaedackersØplanet*nl)
* Support for DVD-IFO (region, subtitles, aspect ratio, etc)
  (thanks p*quaedackersØplanet*nl)
* More complete support for SWF - parsing encapsulated MP3 and/or JPEG content
    (thanks n8n8Øyahoo*com)
* Support for a2b
* Optional scan-through-frames for AVI verification
  (thanks rockcohenØmassive-interactive*nl)
* Support for TTF (thanks infoØbutterflyx*com)
* Support for DSS (https://www.getid3.org/phpBB3/viewtopic.php?t=171)
* Support for SMAF (https://smaf-yamaha.com/what/demo.html)
  https://www.getid3.org/phpBB3/viewtopic.php?t=182
* Support for AMR (https://www.getid3.org/phpBB3/viewtopic.php?t=195)
* Support for 3gpp (https://www.getid3.org/phpBB3/viewtopic.php?t=195)
* Support for ID4 (https://www.wackysoft.cjb.net grizlyY2KØhotmail*com)
* Parse XML data returned in Ogg comments
* Parse XML data from Quicktime SMIL metafiles (klausrathØmac*com)
* ID3v2 genre string creator function
* More complete parsing of JPG
* Support for all old-style ASF packets
* ASF/WMA/WMV tag writing
* Parse declared T??? ID3v2 text information frames, where appropriate
    (thanks Christian Fritz for the idea)
* Recognize encoder:
  https://www.guerillasoft.com/EncSpot2/index.html
  https://ff123.net/identify.html
  https://www.hydrogenaudio.org/?act=ST&f=16&t=9414
  https://www.hydrogenaudio.org/?showtopic=11785
* Support for other OS/2 bitmap structures: Bitmap Array('BA'),
  Color Icon('CI'), Color Pointer('CP'), Icon('IC'), Pointer ('PT')
  https://netghost.narod.ru/gff/graphics/summary/os2bmp.htm
* Support for WavPack RAW mode
* ASF/WMA/WMV data packet parsing
* ID3v2FrameFlagsLookupTagAlter()
* ID3v2FrameFlagsLookupFileAlter()
* obey ID3v2 tag alter/preserve/discard rules
* https://www.geocities.com/SiliconValley/Sector/9654/Softdoc/Illyrium/Aolyr.htm
* proper checking for LINK/LNK frame validity in ID3v2 writing
* proper checking for ASPI-TLEN frame validity in ID3v2 writing
* proper checking for COMR frame validity in ID3v2 writing
* https://www.geocities.co.jp/SiliconValley-Oakland/3664/index.html
* decode GEOB ID3v2 structure as encoded by RealJukebox,
  decode NCON ID3v2 structure as encoded by MusicMatch
  (probably won't happen - the formats are proprietary)



Known Bugs/Issues in getID3() that may be fixed eventually
===========================================================================
https://www.getid3.org/phpBB3/viewtopic.php?t=25

* Cannot determine bitrate for MPEG video with VBR video data
  (need documentation)
* Interlace/progressive cannot be determined for MPEG video
  (need documentation)
* MIDI playtime is sometimes inaccurate
* AAC-RAW mode files cannot be identified
* WavPack-RAW mode files cannot be identified
* mp4 files report lots of "Unknown QuickTime atom type"
   (need documentation)
* Encrypted ASF/WMA/WMV files warn about "unhandled GUID
  ASF_Content_Encryption_Object"
* Bitrate split between audio and video cannot be calculated for
  NSV, only the total bitrate. (need documentation)
* All Ogg formats (Vorbis, OggFLAC, Speex) are affected by the
  problem of large VorbisComments spanning multiple Ogg pages, but
  but only OggVorbis files can be processed with vorbiscomment.
* The version of "head" supplied with Mac OS 10.2.8 (maybe other
  versions too) does only understands a single option (-n) and
  therefore fails. getID3 ignores this and returns wrong md5_data.



Known Bugs/Issues in getID3() that cannot be fixed
--------------------------------------------------
https://www.getid3.org/phpBB3/viewtopic.php?t=25

* 32-bit PHP installations only:
  Files larger than 2GB cannot always be parsed fully by getID3()
  due to limitations in the 32-bit PHP filesystem functions.
  NOTE: Since v1.7.8b3 there is partial support for larger-than-
  2GB files, most of which will parse OK, as long as no critical
  data is located beyond the 2GB offset.
  Known will-work:
  * all file formats on 64-bit PHP
  * ZIP  (format doesn't support files >2GB)
  * FLAC (current encoders don't support files >2GB)
  Known will-not-work:
  * ID3v1 tags (always located at end-of-file)
  * Lyrics3 tags (always located at end-of-file)
  * APE tags (always located at end-of-file)
  Maybe-will-work:
  * Quicktime (will work if needed metadata is before 2GB offset,
    that is if the file has been hinted/optimized for streaming)
  * RIFF.WAV (should work fine, but gives warnings about not being
    able to parse all chunks)
  * RIFF.AVI (playtime will probably be wrong, is only based on
    "movi" chunk that fits in the first 2GB, should issue error
    to show that playtime is incorrect. Other data should be mostly
    correct, assuming that data is constant throughout the file)
* PHP <= v5 on Windows cannot read UTF-8 filenames


Known Bugs/Issues in other programs
-----------------------------------
https://www.getid3.org/phpBB3/viewtopic.php?t=25

* Windows Media Player (up to v11) and iTunes (up to v10+) do
    not correctly handle ID3v2.3 tags with UTF-16BE+BOM
    encoding (they assume the data is UTF-16LE+BOM and either
    crash (WMP) or output Asian character set (iTunes)
* Winamp (up to v2.80 at least) does not support ID3v2.4 tags,
    only ID3v2.3
    see: https://forums.winamp.com/showthread.php?postid=387524
* Some versions of Helium2 (www.helium2.com) do not write
    ID3v2.4-compliant Frame Sizes, even though the tag is marked
    as ID3v2.4)  (detected by getID3())
* MP3ext V3.3.17 places a non-compliant padding string at the end
    of the ID3v2 header. This is supposedly fixed in v3.4b21 but
    only if you manually add a registry key. This fix is not yet
    confirmed.  (detected by getID3())
* CDex v1.40 (fixed by v1.50b7) writes non-compliant Ogg comment
    strings, supposed to be in the format "NAME=value" but actually
    written just "value"  (detected by getID3())
* Oggenc 0.9-rc3 flags the encoded file as ABR whether it's
    actually ABR or VBR.
* iTunes (versions "X v2.0.3", "v3.0.1" are known-guilty, probably
    other versions are too) writes ID3v2.3 comment tags using a
    frame name 'COM ' which is not valid for ID3v2.3+ (it's an
    ID3v2.2-style frame name)  (detected by getID3())
* MP2enc does not encode mono CBR MP2 files properly (half speed
    sound and double playtime)
* MP2enc does not encode mono VBR MP2 files properly (actually
    encoded as stereo)
* tooLAME does not encode mono VBR MP2 files properly (actually
    encoded as stereo)
* AACenc encodes files in VBR mode (actually ABR) even if CBR is
   specified
* AAC/ADIF - bitrate_mode = cbr for vbr files
* LAME 3.90-3.92 prepends one frame of null data (space for the
  LAME/VBR header, but it never gets written) when encoding in CBR
  mode with the DLL
* Ahead Nero encodes TwinVQF with a DSIZ value (which is supposed
  to be the filesize in bytes) of "0" for TwinVQF v1.0 and "1" for
  TwinVQF v2.0  (detected by getID3())
* Ahead Nero encodes TwinVQF files 1 second shorter than they
  should be
* AAC-ADTS files are always actually encoded VBR, even if CBR mode
  is specified (the CBR-mode switches on the encoder enable ABR
  mode, not CBR as such, but it's not possible to tell the
  difference between such ABR files and true VBR)
* STREAMINFO.audio_signature in OggFLAC is always null. "The reason
  it's like that is because there is no seeking support in
  libOggFLAC yet, so it has no way to go back and write the
  computed sum after encoding. Seeking support in Ogg FLAC is the
  #1 item for the next release." - Josh Coalson (FLAC developer)
  NOTE: getID3() will calculate md5_data in a method similar to
  other file formats, but that value cannot be compared to the
  md5_data value from FLAC data in a FLAC file format.
* STREAMINFO.audio_signature is not calculated in FLAC v0.3.0 &
  v0.4.0 - getID3() will calculate md5_data in a method similar to
  other file formats, but that value cannot be compared to the
  md5_data value from FLAC v0.5.0+
* RioPort (various versions including 2.0 and 3.11) tags ID3v2 with
  a WCOM frame that has no data portion
* Earlier versions of Coolplayer adds illegal ID3 tags to Ogg Vorbis
  files, thus making them corrupt.
* Meracl ID3 Tag Writer v1.3.4 (and older) incorrectly truncates the
  last byte of data from an MP3 file when appending a new ID3v1 tag.
  (detected by getID3())
* Lossless-Audio files encoded with and without the -noseek switch
  do actually differ internally and therefore cannot match md5_data
* iTunes has been known to append a new ID3v1 tag on the end of an
  existing ID3v1 tag when ID3v2 tag is also present
  (detected by getID3())
* MediaMonkey may write a blank RGAD ID3v2 frame but put actual
  replay gain adjustments in a series of user-defined TXXX frames
  (detected and handled by getID3() since v1.9.2)




Reference material:
===========================================================================

[www.id3.org material now mirrored at https://id3lib.sourceforge.net/id3/]
* https://www.id3.org/id3v2.4.0-structure.txt
* https://www.id3.org/id3v2.4.0-frames.txt
* https://www.id3.org/id3v2.4.0-changes.txt
* https://www.id3.org/id3v2.3.0.txt
* https://www.id3.org/id3v2-00.txt
* https://www.id3.org/mp3frame.html
* https://minnie.tuhs.org/pipermail/mp3encoder/2001-January/001800.html <mathewhendry@hotmail.com>
* https://www.dv.co.yu/mpgscript/mpeghdr.htm
* https://www.mp3-tech.org/programmer/frame_header.html
* https://users.belgacom.net/gc247244/extra/tag.html
* https://gabriel.mp3-tech.org/mp3infotag.html
* https://www.id3.org/iso4217.html
* https://www.unicode.org/Public/MAPPINGS/ISO8859/8859-1.TXT
* https://www.xiph.org/ogg/vorbis/doc/framing.html
* https://www.xiph.org/ogg/vorbis/doc/v-comment.html
* https://leknor.com/code/php/class.ogg.php.txt
* https://www.id3.org/iso639-2.html
* https://www.id3.org/lyrics3.html
* https://www.id3.org/lyrics3200.html
* https://www.psc.edu/general/software/packages/ieee/ieee.html
* https://www.scri.fsu.edu/~jac/MAD3401/Backgrnd/ieee-expl.html
* https://www.scri.fsu.edu/~jac/MAD3401/Backgrnd/binary.html
* https://www.jmcgowan.com/avi.html
* https://www.wotsit.org/
* https://www.herdsoft.com/ti/davincie/davp3xo2.htm
* https://www.mathdogs.com/vorbis-illuminated/bitstream-appendix.html
* "Standard MIDI File Format" by Dustin Caldwell (from www.wotsit.org)
* https://midistudio.com/Help/GMSpecs_Patches.htm
* https://www.xiph.org/archives/vorbis/200109/0459.html
* https://www.replaygain.org/
* https://www.lossless-audio.com/
* https://download.microsoft.com/download/winmediatech40/Doc/1.0/WIN98MeXP/EN-US/ASF_Specification_v.1.0.exe
* https://mediaxw.sourceforge.net/files/doc/Active%20Streaming%20Format%20(ASF)%201.0%20Specification.pdf
* https://www.uni-jena.de/~pfk/mpp/sv8/ (archived at https://www.hydrogenaudio.org/musepack/klemm/www.personal.uni-jena.de/~pfk/mpp/sv8/)
* https://jfaul.de/atl/
* https://www.uni-jena.de/~pfk/mpp/ (archived at https://www.hydrogenaudio.org/musepack/klemm/www.personal.uni-jena.de/~pfk/mpp/)
* https://www.libpng.org/pub/png/spec/png-1.2-pdg.html
* https://www.real.com/devzone/library/creating/rmsdk/doc/rmff.htm
* https://www.fastgraph.com/help/bmp_os2_header_format.html
* https://netghost.narod.ru/gff/graphics/summary/os2bmp.htm
* https://flac.sourceforge.net/format.html
* https://www.research.att.com/projects/mpegaudio/mpeg2.html
* https://www.audiocoding.com/wiki/index.php?page=AAC
* https://libmpeg.org/mpeg4/doc/w2203tfs.pdf
* https://www.geocities.com/xhelmboyx/quicktime/formats/qtm-layout.txt
* https://developer.apple.com/techpubs/quicktime/qtdevdocs/RM/frameset.htm
* https://www.nullsoft.com/nsv/
* https://www.wotsit.org/download.asp?f=iso9660
* https://sandbox.mc.edu/~bennet/cs110/tc/tctod.html
* https://www.cdroller.com/htm/readdata.html
* https://www.speex.org/manual/node10.html
* https://www.harmony-central.com/Computer/Programming/aiff-file-format.doc
* https://www.faqs.org/rfcs/rfc2361.html
* https://ghido.shelter.ro/
* https://www.ebu.ch/tech_t3285.pdf
* https://www.sr.se/utveckling/tu/bwf
* https://ftp.aessc.org/pub/aes46-2002.pdf
* https://cartchunk.org:8080/
* https://www.broadcastpapers.com/radio/cartchunk01.htm
* https://www.hr/josip/DSP/AudioFile2.html
* https://home.attbi.com/~chris.bagwell/AudioFormats-11.html
* https://www.pure-mac.com/extkey.html
* https://cesnet.dl.sourceforge.net/sourceforge/bonkenc/bonk-binary-format-0.9.txt
* https://www.headbands.com/gspot/
* https://www.openswf.org/spec/SWFfileformat.html
* https://j-faul.virtualave.net/
* https://www.btinternet.com/~AnthonyJ/Atari/programming/avr_format.html
* https://cui.unige.ch/OSG/info/AudioFormats/ap11.html
* https://sswf.sourceforge.net/SWFalexref.html
* https://www.geocities.com/xhelmboyx/quicktime/formats/qti-layout.txt
* https://www-lehre.informatik.uni-osnabrueck.de/~fbstark/diplom/docs/swf/Flash_Uncovered.htm
* https://developer.apple.com/quicktime/icefloe/dispatch012.html
* https://www.csdn.net/Dev/Format/graphics/PCD.htm
* https://tta.iszf.irk.ru/
* https://www.atsc.org/standards/a_52a.pdf
* https://www.alanwood.net/unicode/
* https://www.freelists.org/archives/matroska-devel/07-2003/msg00010.html
* https://www.its.msstate.edu/net/real/reports/config/tags.stats
* https://homepages.slingshot.co.nz/~helmboy/quicktime/formats/qtm-layout.txt
* https://brennan.young.net/Comp/LiveStage/things.html
* https://www.multiweb.cz/twoinches/MP3inside.htm
* https://www.geocities.co.jp/SiliconValley-Oakland/3664/alittle.html#GenreExtended
* https://www.mactech.com/articles/mactech/Vol.06/06.01/SANENormalized/
* https://www.unicode.org/unicode/faq/utf_bom.html
* https://tta.corecodec.org/?menu=format
* https://www.scvi.net/nsvformat.htm
* https://pda.etsi.org/pda/queryform.asp
* https://cpansearch.perl.org/src/RGIBSON/Audio-DSS-0.02/lib/Audio/DSS.pm
* https://trac.musepack.net/trac/wiki/SV8Specification
* https://wyday.com/cuesharp/specification.php
* https://www.sno.phy.queensu.ca/~phil/exiftool/TagNames/Nikon.html