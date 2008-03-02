<?php

/**
 * @file
 * This file was auto-generated by generate-includes.php and includes all of
 * the core files required by HTML Purifier. Use this if performance is a
 * primary concern and you are using an opcode cache. PLEASE DO NOT EDIT THIS
 * FILE, changes will be overwritten the next time the script is run.
 * 
 * @version 3.0.0
 * 
 * @warning
 *      You must *not* include any other HTML Purifier files before this file,
 *      because 'require' not 'require_once' is used.
 * 
 * @warning
 *      This file requires that the include path contains the HTML Purifier
 *      library directory; this is not auto-set.
 */

require 'HTMLPurifier.php';
require 'HTMLPurifier/AttrCollections.php';
require 'HTMLPurifier/AttrDef.php';
require 'HTMLPurifier/AttrTransform.php';
require 'HTMLPurifier/AttrTypes.php';
require 'HTMLPurifier/AttrValidator.php';
require 'HTMLPurifier/Bootstrap.php';
require 'HTMLPurifier/Definition.php';
require 'HTMLPurifier/CSSDefinition.php';
require 'HTMLPurifier/ChildDef.php';
require 'HTMLPurifier/Config.php';
require 'HTMLPurifier/ConfigDef.php';
require 'HTMLPurifier/ConfigSchema.php';
require 'HTMLPurifier/ContentSets.php';
require 'HTMLPurifier/Context.php';
require 'HTMLPurifier/DefinitionCache.php';
require 'HTMLPurifier/DefinitionCacheFactory.php';
require 'HTMLPurifier/Doctype.php';
require 'HTMLPurifier/DoctypeRegistry.php';
require 'HTMLPurifier/ElementDef.php';
require 'HTMLPurifier/Encoder.php';
require 'HTMLPurifier/EntityLookup.php';
require 'HTMLPurifier/EntityParser.php';
require 'HTMLPurifier/Error.php';
require 'HTMLPurifier/ErrorCollector.php';
require 'HTMLPurifier/Exception.php';
require 'HTMLPurifier/Filter.php';
require 'HTMLPurifier/Generator.php';
require 'HTMLPurifier/HTMLDefinition.php';
require 'HTMLPurifier/HTMLModule.php';
require 'HTMLPurifier/HTMLModuleManager.php';
require 'HTMLPurifier/IDAccumulator.php';
require 'HTMLPurifier/Injector.php';
require 'HTMLPurifier/Language.php';
require 'HTMLPurifier/LanguageFactory.php';
require 'HTMLPurifier/Lexer.php';
require 'HTMLPurifier/PercentEncoder.php';
require 'HTMLPurifier/Printer.php';
require 'HTMLPurifier/Strategy.php';
require 'HTMLPurifier/TagTransform.php';
require 'HTMLPurifier/Token.php';
require 'HTMLPurifier/TokenFactory.php';
require 'HTMLPurifier/URI.php';
require 'HTMLPurifier/URIDefinition.php';
require 'HTMLPurifier/URIFilter.php';
require 'HTMLPurifier/URIParser.php';
require 'HTMLPurifier/URIScheme.php';
require 'HTMLPurifier/URISchemeRegistry.php';
require 'HTMLPurifier/AttrDef/CSS.php';
require 'HTMLPurifier/AttrDef/Enum.php';
require 'HTMLPurifier/AttrDef/Integer.php';
require 'HTMLPurifier/AttrDef/Lang.php';
require 'HTMLPurifier/AttrDef/Text.php';
require 'HTMLPurifier/AttrDef/URI.php';
require 'HTMLPurifier/AttrDef/CSS/Number.php';
require 'HTMLPurifier/AttrDef/CSS/AlphaValue.php';
require 'HTMLPurifier/AttrDef/CSS/Background.php';
require 'HTMLPurifier/AttrDef/CSS/BackgroundPosition.php';
require 'HTMLPurifier/AttrDef/CSS/Border.php';
require 'HTMLPurifier/AttrDef/CSS/Color.php';
require 'HTMLPurifier/AttrDef/CSS/Composite.php';
require 'HTMLPurifier/AttrDef/CSS/Filter.php';
require 'HTMLPurifier/AttrDef/CSS/Font.php';
require 'HTMLPurifier/AttrDef/CSS/FontFamily.php';
require 'HTMLPurifier/AttrDef/CSS/ImportantDecorator.php';
require 'HTMLPurifier/AttrDef/CSS/Length.php';
require 'HTMLPurifier/AttrDef/CSS/ListStyle.php';
require 'HTMLPurifier/AttrDef/CSS/Multiple.php';
require 'HTMLPurifier/AttrDef/CSS/Percentage.php';
require 'HTMLPurifier/AttrDef/CSS/TextDecoration.php';
require 'HTMLPurifier/AttrDef/CSS/URI.php';
require 'HTMLPurifier/AttrDef/HTML/Bool.php';
require 'HTMLPurifier/AttrDef/HTML/Color.php';
require 'HTMLPurifier/AttrDef/HTML/FrameTarget.php';
require 'HTMLPurifier/AttrDef/HTML/ID.php';
require 'HTMLPurifier/AttrDef/HTML/Pixels.php';
require 'HTMLPurifier/AttrDef/HTML/Length.php';
require 'HTMLPurifier/AttrDef/HTML/LinkTypes.php';
require 'HTMLPurifier/AttrDef/HTML/MultiLength.php';
require 'HTMLPurifier/AttrDef/HTML/Nmtokens.php';
require 'HTMLPurifier/AttrDef/URI/Email.php';
require 'HTMLPurifier/AttrDef/URI/Host.php';
require 'HTMLPurifier/AttrDef/URI/IPv4.php';
require 'HTMLPurifier/AttrDef/URI/IPv6.php';
require 'HTMLPurifier/AttrDef/URI/Email/SimpleCheck.php';
require 'HTMLPurifier/AttrTransform/BdoDir.php';
require 'HTMLPurifier/AttrTransform/BgColor.php';
require 'HTMLPurifier/AttrTransform/BoolToCSS.php';
require 'HTMLPurifier/AttrTransform/Border.php';
require 'HTMLPurifier/AttrTransform/EnumToCSS.php';
require 'HTMLPurifier/AttrTransform/ImgRequired.php';
require 'HTMLPurifier/AttrTransform/ImgSpace.php';
require 'HTMLPurifier/AttrTransform/Lang.php';
require 'HTMLPurifier/AttrTransform/Length.php';
require 'HTMLPurifier/AttrTransform/Name.php';
require 'HTMLPurifier/ChildDef/Chameleon.php';
require 'HTMLPurifier/ChildDef/Custom.php';
require 'HTMLPurifier/ChildDef/Empty.php';
require 'HTMLPurifier/ChildDef/Required.php';
require 'HTMLPurifier/ChildDef/Optional.php';
require 'HTMLPurifier/ChildDef/StrictBlockquote.php';
require 'HTMLPurifier/ChildDef/Table.php';
require 'HTMLPurifier/ConfigDef/Directive.php';
require 'HTMLPurifier/ConfigDef/DirectiveAlias.php';
require 'HTMLPurifier/ConfigDef/Namespace.php';
require 'HTMLPurifier/ConfigSchema/Exception.php';
require 'HTMLPurifier/ConfigSchema/Interchange.php';
require 'HTMLPurifier/ConfigSchema/InterchangeValidator.php';
require 'HTMLPurifier/ConfigSchema/StringHash.php';
require 'HTMLPurifier/ConfigSchema/StringHashAdapter.php';
require 'HTMLPurifier/ConfigSchema/StringHashParser.php';
require 'HTMLPurifier/ConfigSchema/StringHashReverseAdapter.php';
require 'HTMLPurifier/ConfigSchema/Validator.php';
require 'HTMLPurifier/ConfigSchema/Validator/Alnum.php';
require 'HTMLPurifier/ConfigSchema/Validator/Exists.php';
require 'HTMLPurifier/DefinitionCache/Decorator.php';
require 'HTMLPurifier/DefinitionCache/Null.php';
require 'HTMLPurifier/DefinitionCache/Serializer.php';
require 'HTMLPurifier/DefinitionCache/Decorator/Cleanup.php';
require 'HTMLPurifier/DefinitionCache/Decorator/Memory.php';
require 'HTMLPurifier/HTMLModule/Bdo.php';
require 'HTMLPurifier/HTMLModule/CommonAttributes.php';
require 'HTMLPurifier/HTMLModule/Edit.php';
require 'HTMLPurifier/HTMLModule/Hypertext.php';
require 'HTMLPurifier/HTMLModule/Image.php';
require 'HTMLPurifier/HTMLModule/Legacy.php';
require 'HTMLPurifier/HTMLModule/List.php';
require 'HTMLPurifier/HTMLModule/NonXMLCommonAttributes.php';
require 'HTMLPurifier/HTMLModule/Object.php';
require 'HTMLPurifier/HTMLModule/Presentation.php';
require 'HTMLPurifier/HTMLModule/Proprietary.php';
require 'HTMLPurifier/HTMLModule/Ruby.php';
require 'HTMLPurifier/HTMLModule/Scripting.php';
require 'HTMLPurifier/HTMLModule/StyleAttribute.php';
require 'HTMLPurifier/HTMLModule/Tables.php';
require 'HTMLPurifier/HTMLModule/Target.php';
require 'HTMLPurifier/HTMLModule/Text.php';
require 'HTMLPurifier/HTMLModule/Tidy.php';
require 'HTMLPurifier/HTMLModule/XMLCommonAttributes.php';
require 'HTMLPurifier/HTMLModule/Tidy/Proprietary.php';
require 'HTMLPurifier/HTMLModule/Tidy/XHTMLAndHTML4.php';
require 'HTMLPurifier/HTMLModule/Tidy/Strict.php';
require 'HTMLPurifier/HTMLModule/Tidy/Transitional.php';
require 'HTMLPurifier/HTMLModule/Tidy/XHTML.php';
require 'HTMLPurifier/Injector/AutoParagraph.php';
require 'HTMLPurifier/Injector/Linkify.php';
require 'HTMLPurifier/Injector/PurifierLinkify.php';
require 'HTMLPurifier/Lexer/DOMLex.php';
require 'HTMLPurifier/Lexer/DirectLex.php';
require 'HTMLPurifier/Printer/CSSDefinition.php';
require 'HTMLPurifier/Printer/ConfigForm.php';
require 'HTMLPurifier/Printer/HTMLDefinition.php';
require 'HTMLPurifier/Strategy/Composite.php';
require 'HTMLPurifier/Strategy/Core.php';
require 'HTMLPurifier/Strategy/FixNesting.php';
require 'HTMLPurifier/Strategy/MakeWellFormed.php';
require 'HTMLPurifier/Strategy/RemoveForeignElements.php';
require 'HTMLPurifier/Strategy/ValidateAttributes.php';
require 'HTMLPurifier/TagTransform/Font.php';
require 'HTMLPurifier/TagTransform/Simple.php';
require 'HTMLPurifier/Token/Comment.php';
require 'HTMLPurifier/Token/Tag.php';
require 'HTMLPurifier/Token/Empty.php';
require 'HTMLPurifier/Token/End.php';
require 'HTMLPurifier/Token/Start.php';
require 'HTMLPurifier/Token/Text.php';
require 'HTMLPurifier/URIFilter/DisableExternal.php';
require 'HTMLPurifier/URIFilter/DisableExternalResources.php';
require 'HTMLPurifier/URIFilter/HostBlacklist.php';
require 'HTMLPurifier/URIFilter/MakeAbsolute.php';
require 'HTMLPurifier/URIScheme/ftp.php';
require 'HTMLPurifier/URIScheme/http.php';
require 'HTMLPurifier/URIScheme/https.php';
require 'HTMLPurifier/URIScheme/mailto.php';
require 'HTMLPurifier/URIScheme/news.php';
require 'HTMLPurifier/URIScheme/nntp.php';
