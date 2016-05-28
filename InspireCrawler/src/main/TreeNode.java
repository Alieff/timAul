/** License not specified yet**/
package main;

import java.util.ArrayList;
import java.util.LinkedList;
import java.util.Queue;

/**
 * <p>TreeNode is used to visualize the tree on the Parse Tree. 
 *     It's used to find the 2nd constituent (NP,VP or other thing)</p>
 * @author alief refactored by haryoaw
 * @version 19-04-2016
 */
public class TreeNode {
  private String label = "";
  private String value = "";
  private TreeNode parent;
  private ArrayList<TreeNode> childs = new ArrayList<>();
  private int level = -1;

    public String getLabel() {
        return label;
    }

    public void setLabel(String label) {
        this.label = label;
    }

    public String getValue() {
        return value;
    }

    public void setValue(String value) {
        this.value = value;
    }

    public TreeNode getParent() {
        return parent;
    }

    public void setParent(TreeNode parent) {
        this.parent = parent;
    }

    public ArrayList<TreeNode> getChilds() {
        return childs;
    }

    public void setChilds(ArrayList<TreeNode> childs) {
        this.childs = childs;
    }

    public int getLevel() {
        return level;
    }

    public void setLevel(int level) {
        this.level = level;
    }

    /**
   * add new node to the tree
   * @return node that was just added
   */
  private TreeNode addNode() {
    TreeNode node = new TreeNode();
		getChilds().add(node);
    return node;
  }

  /**
   * Construct the tree with the given Parse Tree
   * @param parseTree given parse tree with JSON format
   */
  public TreeNode construct(String parseTree) {
    // contoh input (ROOT\n  (NP (NNP Privacy) (NNP Policy)))
    String tag = "";
    TreeNode head = this;

    for (int i = 0; i < parseTree.length(); i++) {
      char currentChar = parseTree.charAt(i);

      if (currentChar == '(') { 
        TreeNode node = head.addNode();
        head.value = "";
		node.setParent(head);
        head = node;
		head.setLevel(node.getParent().getLevel() +1);
      } else if (currentChar == ' ' && tag.length() > 0 ) {
        if (head.getLabel() == null){
			head.setLabel(tag);
		} else{
			head.setValue(tag);
		}
        tag = "";
      } else if (currentChar == ')') {
       	if(head.getValue() == null){
			head.setValue(tag);
		}
		head = head.getParent();
      } else if (currentChar != ' ') {
        tag += currentChar;
      }
    }
      return this;
  }

    /**
     * Do level order and print the result
     * @deprecated
     */
	public void doLevelOrder() {
		Queue queue = new LinkedList<TreeNode>();
		queue.add(this);
		while (!queue.isEmpty()){
			TreeNode thisNode = (TreeNode) queue.poll();
			for (TreeNode node : thisNode.getChilds()) {
				queue.add(node);
			}
//			System.out.println(thisNode);
		}
	}

/**
     * Get the node on level 2 tree
     * @return the value of node on lv 2.
     */
		public String getChildrenOfLv2() {
			String result = "";
			Queue queue = new LinkedList<TreeNode>();
			queue.add(this);
			while (!queue.isEmpty()){
				TreeNode thisNode = (TreeNode) queue.poll();
				for (TreeNode node : thisNode.getChilds()) {
					if (node.getLevel() ==2){
						result += "{";
						String nodeVal = node.getLeaves(node);

						if (nodeVal.contains("/PERSON")){
							nodeVal = nodeVal.replace("/PERSON", "");
							result += nodeVal;
							result += "}/PERSON ";
						} else {
							result += nodeVal;
							result += "}/"+ node.getLabel() +" ";
						}
					}
					queue.add(node);
				}
				if (thisNode.getLevel() > 2) {
					return result;
				}
			}
			return result;
		}

/**
     * Method ini akan mendapatkan semua leaf dari sebuah tree.
     *
     * @param startNode Root node yang akan dicari nilai-nilai leafnya
     * @return          <code>String</code> dari nilai-nilai leaf yang di append
     * @see             SentenceTagger
     * @since           1.0
     */
	private String getLeaves(TreeNode startNode) {
		String result = "";
		Queue queue = new LinkedList<TreeNode>();
		queue.add(startNode);

		while (!queue.isEmpty()){
			TreeNode thisNode = (TreeNode) queue.poll();
			for (TreeNode node : thisNode.getChilds()) {
				queue.add(node);
			}
			if (thisNode.getChilds().size() == 0) {
				result += thisNode.getValue() +" ";
			}
		}
		return result;
	}



  @Override
  public boolean equals(Object obj) {
      TreeNode other = (TreeNode) obj;
      if(this.level==-1 || other.level == -1){
          return this.level == other.level;
      }
      return this.label == other.label &&
              this.value == other.value &&
              this.parent.equals(other.parent) &&
              this.childs.equals(other.childs) &&
              this.level == other.level;
  }


	@Override
	public String toString() {
        return "label:" + this.getLabel()
				+ ", value:"
				+ this.getValue()
				+", level:"
				+ this.getLevel();
	}

}
