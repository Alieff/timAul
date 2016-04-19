package main;
import java.io.BufferedReader;
import java.io.FileReader;
import java.util.List;

import edu.stanford.nlp.ling.Sentence;
import edu.stanford.nlp.ling.TaggedWord;
import edu.stanford.nlp.ling.HasWord;
import edu.stanford.nlp.tagger.maxent.MaxentTagger;

import edu.stanford.nlp.ie.AbstractSequenceClassifier;
import edu.stanford.nlp.ie.crf.*;
import edu.stanford.nlp.io.IOUtils;
import edu.stanford.nlp.ling.CoreLabel;
import edu.stanford.nlp.ling.CoreAnnotations;
import edu.stanford.nlp.sequences.DocumentReaderAndWriter;
import edu.stanford.nlp.util.Triple;
import java.io.*;
import java.util.*;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import edu.stanford.nlp.dcoref.CorefChain;
import edu.stanford.nlp.dcoref.CorefCoreAnnotations;
import edu.stanford.nlp.io.*;
import edu.stanford.nlp.ling.*;
import edu.stanford.nlp.pipeline.*;
import edu.stanford.nlp.semgraph.SemanticGraph;
import edu.stanford.nlp.semgraph.SemanticGraphCoreAnnotations;
import edu.stanford.nlp.sentiment.SentimentCoreAnnotations;
import edu.stanford.nlp.trees.*;
import edu.stanford.nlp.util.*;

import java.util.List;

// cara pakai : load modelnya dulu, baru get resultnya

/*
 * @author Alief
 */

public class WordIdentifier{
	String POSTAG_MODEL = "model/english-left3words-distsim.tagger";
	String NER_CLASSIFIER = "classifier/english.all.3class.distsim.crf.ser.gz";
	MaxentTagger tagger;
	AbstractSequenceClassifier<CoreLabel> classifier;
	String sentence;

	public WordIdentifier(String sentence){
		this.sentence = sentence;
	}
	public void setSentence(String sentence){
		this.sentence = sentence;
	}


	public void loadPOSTagModel(){
		this.tagger = new MaxentTagger(this.POSTAG_MODEL);
	}
	private boolean isEnglish(String sentence){
		return true;
	}
	private String pOSTagEng(String word){
		return this.tagger.tagString(word);
	}
	private String pOSTagInd(String sentence){
		return "ind";
	}
	public String getPostagResult(){
		if(isEnglish(sentence)){
			return pOSTagEng(sentence);
		}
		return pOSTagInd(sentence);
	}


	public void loadNERClassifier(){
		try{
			this.classifier = CRFClassifier.getClassifier(NER_CLASSIFIER);
		}catch(Exception e){
			System.out.println("NER error ");
		}
	}
	public String getNERResult(){

		return this.classifier.classifyToString(this.sentence);
	}


}