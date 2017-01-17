<?php

// FileObject class
// Provides helper functions to make object handling easier
class FileObject {
	// Initialize with Symfony\Component\Finder\SplFileInfo
	private $info;

	// Use SplFileInfo to get SplFileObject
	private $object;

	// Public properties
	public $raw;
	public $filename;
	public $extension;
	public $mime;
	public $obfuscate;

	public function __construct( $info, $obfuscate = true ) {
		$this->info      = $info;
		$this->object    = $this->info->openFile();
		$this->raw       = $this->getRaw();
		$this->obfuscate = (int) $obfuscate;
		$this->filename  = $this->obfuscate ? $this->getObfuscatedFilename() : $this->info->getClientOriginalName();
		$this->extension = $this->getExtension();
		$this->mime      = $this->getMime();
	}

	/**
	 * Private methods for constructor.
	 */
	private function getRaw() {
		// Save our current position
		$position = $this->object->ftell();

		$this->object->rewind();

		$raw = '';

		while ( $this->object->valid() ) {
			$raw .= $this->object->fgets();
		}

		// Go back to our original position
		$this->object->fseek( $position );

		return $raw;
	}

	private function getObfuscatedFilename() {
		return hash( 'md5', $this->raw );
	}

	private function getExtension() {
		return $this->info->guessClientExtension();
	}

	private function getMime() {
		return $this->info->getClientMimeType();
	}

	/**
	 * Public methods for caller.
	 */
	public function getFullFilename() {
		return $this->obfuscate ? ( $this->filename . '.' . $this->extension ) : $this->filename;
	}

	public function isImage() {
		return strpos( $this->mime, 'image' ) === 0;
	}
}
